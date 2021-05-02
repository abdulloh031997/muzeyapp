<?php

namespace backend\controllers;

use Yii;
use common\models\CollectionCategory;
use backend\models\CollectionCategorySearch;
use common\models\SiteContent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CollectionCategoryController implements the CRUD actions for CollectionCategory model.
 */
class CollectionCategoryController extends Controller
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
     * Lists all CollectionCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CollectionCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CollectionCategory model.
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
     * Creates a new CollectionCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CollectionCategory();
        if ($model->load($post = Yii::$app->request->post())) {

            $SiteContent = new SiteContent();
            $SiteContent->type = 'collection_category';
            $SiteContent->created_by = Yii::$app->user->id;
            $SiteContent->save(false);
            $langs = active_langauges();

            foreach ($langs as $index => $lang) {
                $model2 = new CollectionCategory();
                $model2->language = $lang->lang_code;
                $model2->name = $model->name[$lang->lang_code];
                $model2->status = $model->status;
                $model2->file = $model->image;
                $model2->content_id = $SiteContent->id;
                $model2->save();
            }
                return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CollectionCategory model.
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
                $model2 =  CollectionCategory::findOne([
                    'content_id'=>$model->content_id,
                    'language'=>$lang->lang_code
                ]);
                $model2->name = $model->name[$lang->lang_code];
                $model2->status = $model->status;
                $model2->file = $model->image;
                $model2->save();
            }

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CollectionCategory model.
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
     * Finds the CollectionCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CollectionCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CollectionCategory::findOne(['content_id'=>$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
