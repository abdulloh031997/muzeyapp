<?php

namespace backend\controllers;

use Yii;
use common\models\Language;
use backend\models\LanguageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LanguageController implements the CRUD actions for Language model.
 */
class LanguageController extends Controller
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
     * Lists all Language models.
     * @return mixed
     */
    public function actionIndex()
    {
        // Get ajax action
        $ajax = $_POST['ajax'];

        if ($ajax == 'update-action') {
            $output['error'] = true;
            $output['success'] = false;

            $id = $_POST['id'];
            $checked = $_POST['checked'];
            $language = new Language();

            if ($checked == 'true') {
                $status = true;
                $update = $language->updateStatus($id, 1);
            } else {
                $status = false;
                $update = $language->updateStatus($id, 0);
            }

            if ($update) {
                $output['error'] = false;
                $output['success'] = true;
                $log_data[$update->lang_code] = $status;
                // Create temp
                // create_temp_for('languages');
            }

            echo json_encode($output);
            exit();
        }

        $languages = Language::find()
            ->orderBy('name')
            ->asArray()
            ->all();

        return $this->render('index', ['languages' => $languages]);
    }
    

}
