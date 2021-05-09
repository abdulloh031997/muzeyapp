<?php

namespace backend\controllers;

use Yii;
use common\models\About;
use backend\models\AboutSearch;
use common\models\SiteContent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AboutController implements the CRUD actions for About model.
 */
class AboutController extends Controller
{
    public function registerJs($file)
    {
        if ($file) {
            $bundle = \backend\assets\AppAsset::register(\Yii::$app->view);

            if (is_array($file)) {
                foreach ($file as $fi) {
                    $bundle->js[] = $fi;
                }
            } else {
                $bundle->js[] = $file;
            }
        }
    }

    /**
     * Register CSS file or files
     *
     * @param [type] $file
     * @return void
     */
    public function registerCss($file)
    {
        if ($file) {
            $bundle = \backend\assets\AppAsset::register(\Yii::$app->view);

            if (is_array($file)) {
                foreach ($file as $fi) {
                    $bundle->css[] = $fi;
                }
            } else {
                $bundle->css[] = $file;
            }
        }
    }
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
     * Lists all About models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AboutSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single About model.
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
     * Creates a new About model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new About();
        if ($model->load($post = Yii::$app->request->post())) {

            $SiteContent = new SiteContent();
            $SiteContent->type = 'About';
            $SiteContent->created_by = Yii::$app->user->id;
            $SiteContent->save(false);
            $langs = active_langauges();

            foreach ($langs as $index => $lang) {
                $model2 = new About();
                $model2->language = $lang->lang_code;
                $model2->name = $model->name[$lang->lang_code];
                $model2->status = $model->status;
                $model2->file = $model->image;
                $model2->content_id = $SiteContent->id;
                $model2->save();
            }
                return $this->redirect(['index']);
        }
        $this->registerJs(array(
            'dist/libs/tinymce/tinymce.min.js',
            'theme/components/tinymce-editor.js',
        ));
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing About model.
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
                $model2 =  About::findOne([
                    'content_id'=>$model->content_id,
                    'language'=>$lang->lang_code
                ]);
                $model2->name = $model->name[$lang->lang_code];
                $model2->save();
            }

            return $this->redirect(['index']);
        }
        $this->registerJs(array(
            'dist/libs/tinymce/tinymce.min.js',
            'theme/components/tinymce-editor.js',
        ));
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing About model.
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
     * Finds the About model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return About the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = About::findOne(['content_id'=>$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
