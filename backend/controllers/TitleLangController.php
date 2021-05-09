<?php

namespace backend\controllers;

use Yii;
use common\models\TitleLang;
use backend\models\TitleLangSearch;
use common\models\SiteContent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TitleLangController implements the CRUD actions for TitleLang model.
 */
class TitleLangController extends Controller
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
     * Lists all TitleLang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TitleLangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TitleLang model.
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
     * Creates a new TitleLang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TitleLang();
        if ($model->load($post = Yii::$app->request->post())) {

            $SiteContent = new SiteContent();
            $SiteContent->type = 'titlelang';
            $SiteContent->created_by = Yii::$app->user->id;
            $SiteContent->save();
            $langs = active_langauges();
            foreach ($langs as $index => $lang) {
                $model2 = new TitleLang();
                $model2->language = $lang->lang_code;
                $model2->title = $model->title[$lang->lang_code];
                $model2->body = $model->body[$lang->lang_code];
                $model2->status = $model->status;
                $model2->file = $model->image;
                $model2->user_id = Yii::$app->user->identity->id;
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
     * Updates an existing TitleLang model.
     * If update is successful, the browser will be redirected to the 'view' TitleLang.
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
                $model2 = TitleLang::findOne([
                    'content_id'=>$model->content_id,
                    'language'=>$lang->lang_code
                ]);
                $model2->title = $model->title[$lang->lang_code];
                $model2->body = $model->body[$lang->lang_code];
                $model2->status = $model->status;
                $model2->user_id = Yii::$app->user->identity->id;
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
     * Deletes an existing TitleLang model.
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
     * Finds the TitleLang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TitleLang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TitleLang::findOne(['content_id'=>$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
