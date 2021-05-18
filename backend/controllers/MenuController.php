<?php

namespace backend\controllers;

use Yii;
use common\models\Menu;
use backend\models\MenuSearch;
use common\models\SiteContent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menu model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menu();
        if ($model->load($post = Yii::$app->request->post())) {

            $SiteContent = new SiteContent();
            $SiteContent->type = 'Menu';
            $SiteContent->created_by = Yii::$app->user->id;
            $SiteContent->save(false);
            $langs = active_langauges();

            foreach ($langs as $index => $lang) {
                $model2 = new Menu();
                $model2->language = $lang->lang_code;
                $model2->name = $model->name[$lang->lang_code];
                $model2->c_order = $model->c_order;
                if (is_numeric($model->parent_id[$lang->lang_code])) {
                    $model2->parent_id = $model->parent_id[$lang->lang_code];
                } else {
                    $model2->parent_id = 0;
                }
                $model2->link = $model->link;
                $model2->content_id = $SiteContent->id;
                $model2->save(false);
        }
        return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $langs = active_langauges();

            foreach ($langs as $index => $lang) {
                $model2 =  Menu::findOne([
                    'content_id'=>$model->content_id,
                    'language'=>$lang->lang_code
                ]);
                if(!empty($model2)){
                    $model2->name = $model->name[$lang->lang_code];
                    $model2->c_order = $model->c_order;
                    $model2->link = $model->link;
                    $model2->save();
                }else{
                    $model2 = new Menu();
                    $model2->language = $lang->lang_code;
                    $model2->name = $model->name[$lang->lang_code];
                    $model2->c_order = $model->c_order;
                    if (is_numeric($model->parent_id[$lang->lang_code])) {
                        $model2->parent_id = $model->parent_id[$lang->lang_code];
                    } else {
                        $model2->parent_id = 0;
                    }
                    $model2->link = $model->link;
                    $model2->save(false);
                }

            }

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne(['content_id'=>$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
