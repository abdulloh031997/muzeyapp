<?php

namespace backend\controllers;

use Yii;
use common\models\Cours;
use backend\models\CoursSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\base\Model;
use common\models\CoursBlock;
use Exception;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\Response;
/**
 * CoursController implements the CRUD actions for Cours model.
 */
class CoursController extends Controller
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
     * Lists all Cours models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CoursSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cours model.
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
     * Creates a new Cours model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $model = new Cours();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    // /**
    //  * Updates an existing Cours model.
    //  * If update is successful, the browser will be redirected to the 'view' page.
    //  * @param integer $id
    //  * @return mixed
    //  * @throws NotFoundHttpException if the model cannot be found
    //  */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }
    public function actionCreate()
    {
        $modelCours = new Cours();
        $modelsCoursBlock = [new CoursBlock()];
        if ($modelCours->load(Yii::$app->request->post())) {

            $modelsCoursBlock = Model::createMultiple(CoursBlock::classname());
            Model::loadMultiple($modelsCoursBlock, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsCoursBlock),
                    ActiveForm::validate($modelCours)
                );
            }

            // validate all models
            $valid = $modelCours->validate();
            $valid = Model::validateMultiple($modelsCoursBlock) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelCours->save(false)) {
                        foreach ($modelsCoursBlock as $modelCoursBlock) {
                            $modelCoursBlock->cours_id = $modelCours->id;
                            if (! ($flag = $modelCoursBlock->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelCours->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'modelCours' => $modelCours,
            'modelsCoursBlock' => (empty($modelsCoursBlock)) ? [new CoursBlock] : $modelsCoursBlock
        ]);
    }

    /**
     * Updates an existing Cours model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelCours = $this->findModel($id);
        $modelsCoursBlock = $modelCours->coursBlocks;
        if ($modelCours->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsCoursBlock, 'id', 'id');
            $modelsCoursBlock = Model::createMultiple(CoursBlock::classname(), $modelsCoursBlock);
            Model::loadMultiple($modelsCoursBlock, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsCoursBlock, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsCoursBlock),
                    ActiveForm::validate($modelCours)
                );
            }

            // validate all models
            $valid = $modelCours->validate();
            $valid = Model::validateMultiple($modelsCoursBlock) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelCours->save(false)) {
                        if (! empty($deletedIDs)) {
                            CoursBlock::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsCoursBlock as $modelCoursBlock) {
                            $modelCoursBlock->Cours_id = $modelCours->id;
                            if (! ($flag = $modelCoursBlock->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelCours->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'modelCours' => $modelCours,
            'modelsCoursBlock' => (empty($modelsCoursBlock)) ? [new CoursBlock] : $modelsCoursBlock
        ]);
    }

    /**
     * Deletes an existing Cours model.
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
     * Finds the Cours model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cours the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cours::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
