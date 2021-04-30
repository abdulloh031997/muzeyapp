<?php

namespace backend\controllers;

use Yii;
use common\models\Impressions;
use backend\models\ImpressionsSearch;
use common\models\SiteContent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ImpressionsController implements the CRUD actions for Impressions model.
 */
class ImpressionsController extends Controller
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
     * Lists all Impressions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImpressionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Impressions model.
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
     * Creates a new Impressions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate()
    {
        $model = new Impressions();
        if ($model->load($post = Yii::$app->request->post())) {

            $SiteContent = new SiteContent();
            $SiteContent->type = 'impressions';
            $SiteContent->created_by = Yii::$app->user->id;
            $SiteContent->save();
            $langs = active_langauges();
            foreach ($langs as $index => $lang) {
                $model2 = new Impressions();
                $model2->language = $lang->lang_code;
                $model2->title = $model->title[$lang->lang_code];
                $model2->description = $model->description[$lang->lang_code];
                $model2->body = $model->body[$lang->lang_code];
                $model2->status = $model->status;
                $model2->file = $model->image;
                $model2->date = $model->date;
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
     * Updates an existing Impressions model.
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
                $model2 =  Impressions::findOne([
                    'content_id'=>$model->content_id,
                    'language'=>$lang->lang_code
                ]);
                $model2->title = $model->title[$lang->lang_code];
                $model2->description = $model->description[$lang->lang_code];
                $model2->body = $model->body[$lang->lang_code];
                $model2->status = $model->status;
                $model2->file = $model->image;
                $model2->date = $model->date;
                $model2->save();
            }

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Impressions model.
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
     * Finds the Impressions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Impressions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Impressions::findOne(['content_id'=>$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
