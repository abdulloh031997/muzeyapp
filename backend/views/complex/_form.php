<?php

use common\models\Edu;
use common\models\EduDirection;
use common\models\Region;
use common\models\Science;
use phpDocumentor\Reflection\DocBlock\Tags\Since;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$data_region = Region::find()->where(['parent_id' => 860])->asArray()->all();
$data_edu = Edu::find()->asArray()->all();
$data_education = EduDirection::find()->asArray()->all();
$fan = Science::find()->asArray()->all();

$data_regionA = ArrayHelper::map($data_region, 'id', 'name');
$data_regionB = ArrayHelper::map($data_edu, 'id', 'name_uz');
$data_regionC = ArrayHelper::map($data_education, 'id', 'name');
$data_regionD = ArrayHelper::map($fan, 'id', 'name');
/* @var $this yii\web\View *[]/
/* @var $model common\models\Complex */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="complex-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($modelComplex, 'region_id')->dropDownList($data_regionA, ['class' => 'select2 form-control']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($modelComplex, 'edu_id')->dropDownList($data_regionB, ['class' => 'select2 form-control']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($modelComplex, 'education_id')->dropDownList($data_regionC, ['class' => 'select2 form-control']) ?>
        </div>
    </div>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 5, // the maximum times, an element can be added (default 999)
        'min' => 5, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsComplexFans[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'full_name',
            'address_line1',
            'address_line2',
            'city',
            'state',
            'postal_code',
        ],
    ]); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Add</button>
            </h4>
        </div>
        <div class="panel-body">
            <div class="container-items">
                <!-- widgetBody -->
                <?php foreach ($modelsComplexFans as $i => $modelsComplexFan) : ?>
                    <div class="item panel panel-default">
                        <!-- widgetItem -->
                        <div class="float-heading">
                            <div class=" float-right">
                                <span class="font-weight-bold">Block <?= $i++ ?></span>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            // necessary for update action.
                            if (!$modelsComplexFan->isNewRecord) {
                                echo Html::activeHiddenInput($modelsComplexFan, "[{$i}]id");
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row pt-5">
                                        <div class="col-md-12">
                                            <?= $form->field($modelsComplexFan, "[{$i}]fan_id")->dropDownList($data_regionD,['maxlength' => true,'class' =>'w-100 select2 form-control']) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12"> <?= $form->field($modelsComplexFan, "[{$i}]ball")->textInput(['maxlength' => true]) ?></div>
                                        <div class="col-md-12"> <?= $form->field($modelsComplexFan, "[{$i}]block_order")->textInput(['maxlength' => true]) ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div><!-- .panel -->
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton($modelsComplexFan->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>