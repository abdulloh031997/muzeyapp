<?php

namespace backend\controllers;

use app\base\Model;
use Yii;
use common\models\Complex;
use common\models\ComplexFans;
use backend\models\ComplexSearch;
use Exception;
use yii\widgets\ActiveForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Response;

/**
 * ComplexController implements the CRUD actions for Complex model.
 */
class ComplexController extends Controller
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
     * Lists all Complex models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ComplexSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Complex model.
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
     * Creates a new Complex model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelComplex = new Complex;
        $modelsComplexFans = [new ComplexFans];
        if ($modelComplex->load(Yii::$app->request->post())) {

            $modelsComplexFans = Model::createMultiple(ComplexFans::classname());
            Model::loadMultiple($modelsComplexFans, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsComplexFans),
                    ActiveForm::validate($modelComplex)
                );
            }

            // validate all models
            $valid = $modelComplex->validate();
            $valid = Model::validateMultiple($modelsComplexFans) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelComplex->save(false)) {
                        foreach ($modelsComplexFans as $modelComplexFans) {
                            $modelComplexFans->Complex_id = $modelComplex->id;
                            if (! ($flag = $modelComplexFans->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelComplex->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'modelComplex' => $modelComplex,
            'modelsComplexFans' => (empty($modelsComplexFans)) ? [new ComplexFans] : $modelsComplexFans
        ]);
    }

    /**
     * Updates an existing Complex model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelComplex = $this->findModel($id);
        $modelsComplexFans = $modelComplex->ComplexFanses;

        if ($modelComplex->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsComplexFans, 'id', 'id');
            $modelsComplexFans = Model::createMultiple(ComplexFans::classname(), $modelsComplexFans);
            Model::loadMultiple($modelsComplexFans, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsComplexFans, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsComplexFans),
                    ActiveForm::validate($modelComplex)
                );
            }

            // validate all models
            $valid = $modelComplex->validate();
            $valid = Model::validateMultiple($modelsComplexFans) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelComplex->save(false)) {
                        if (! empty($deletedIDs)) {
                            ComplexFans::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsComplexFans as $modelComplexFans) {
                            $modelComplexFans->Complex_id = $modelComplex->id;
                            if (! ($flag = $modelComplexFans->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelComplex->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'modelComplex' => $modelComplex,
            'modelsComplexFans' => (empty($modelsComplexFans)) ? [new ComplexFans] : $modelsComplexFans
        ]);
    }
    // public function actionCreate()
    // {
    //     $model = new Complex();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    // /**
    //  * Updates an existing Complex model.
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

    /**
     * Deletes an existing Complex model.
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
     * Finds the Complex model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Complex the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Complex::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
