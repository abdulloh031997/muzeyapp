<?php

namespace backend\controllers;

use Yii;
use common\models\Team;
use backend\models\TeamSearch;
use common\models\SiteContent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeamController implements the CRUD actions for Team model.
 */
class TeamController extends Controller
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
     * Lists all Team models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Team model.
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
     * Creates a new Team model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Team();
        if ($model->load($post = Yii::$app->request->post())) {

            $SiteContent = new SiteContent();
            $SiteContent->type = 'team';
            $SiteContent->created_by = Yii::$app->user->id;
            $SiteContent->save();
            $langs = active_langauges();
            foreach ($langs as $index => $lang) {
                $model2 = new Team();
                $model2->language = $lang->lang_code;
                $model2->fio = $model->fio[$lang->lang_code];
                $model2->about = $model->about[$lang->lang_code];
                $model2->position = $model->position[$lang->lang_code];
                $model2->status = $model->status;
                $model2->file = $model->image;
                $model2->twitter = $model->twitter;
                $model2->facebook = $model->facebook;
                $model2->instagram = $model->instagram;
                $model2->linkedin = $model->linkedin;
                $model2->telegram = $model->telegram;
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
     * Updates an existing Team model.
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
                $model2 =  Team::findOne([
                    'content_id'=>$model->content_id,
                    'language'=>$lang->lang_code
                ]);
                $model2->fio = $model->fio[$lang->lang_code];
                $model2->position = $model->position[$lang->lang_code];
                $model2->about = $model->about[$lang->lang_code];
                $model2->status = $model->status;
                $model2->category_id = $model->category_id;
                $model2->file = $model->image;
                $model2->twitter = $model->twitter;
                $model2->facebook = $model->facebook;
                $model2->instagram = $model->instagram;
                $model2->linkedin = $model->linkedin;
                $model2->telegram = $model->telegram;
                $model2->save(false);
            }

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Team model.
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
     * Finds the Team model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Team the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Team::findOne(['content_id'=>$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
