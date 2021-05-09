<?php

namespace backend\controllers;

use Yii;
use common\models\Page;
use backend\models\PageSearch;
use common\models\Post;
use common\models\SiteContent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
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
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
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
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Page();
        if ($model->load($post = Yii::$app->request->post())) {

            $SiteContent = new SiteContent();
            $SiteContent->type = 'page';
            $SiteContent->created_by = Yii::$app->user->id;
            $SiteContent->save();
            $langs = active_langauges();
            foreach ($langs as $index => $lang) {
                $model2 = new Page();
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
        $this->registerJs(array(
            'dist/libs/tinymce/tinymce.min.js',
            'theme/components/tinymce-editor.js',
        ));

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Page model.
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
                $model2 = Page::findOne([
                    'content_id'=>$model->content_id,
                    'language'=>$lang->lang_code
                ]);
                $model2->title = $model->title[$lang->lang_code];
                $model2->body = $model->body[$lang->lang_code];
                $model2->status = $model->status;
                $model2->file = $model->image;
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
     * Deletes an existing Page model.
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
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne(['content_id'=>$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
