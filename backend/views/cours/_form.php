<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Cours */
/* @var $form yii\widgets\ActiveForm */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>
<div class="cours-form card p-3">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row pb-5">
        <div class="col-sm-3">
            <?= $form->field($modelCours, 'name_uz')->textInput(['class' => 'form-control']) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($modelCours, 'name_ru')->textInput(['class' => 'form-control']) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($modelCours, 'name_en')->textInput(['class' => 'form-control']) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($modelCours, 'file')->fileInput(['class' => 'form-control']) ?>
        </div>
    </div>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be added (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsCoursBlock[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'name_uz',
            'name_ru',
            'name_en',
        ],
    ]); ?>
    <div class="panel-heading float-left">
        <button type="button" class="pull-right add-item btn btn-success btn-sm"><i class="fa fa-plus"></i> Add </button>
        <div class="clearfix"></div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="container-items">
                <!-- widgetBody -->
                <?php foreach ($modelsCoursBlock as $i => $one) : ?>
                    <div class="item panel panel-default">
                        <!-- widgetItem -->
                        <div class="panel-heading text-right">
                            <span class="panel-title-Application font-weight-bold">Bo'limlar</span>
                            <button type="button" class="pull-right remove-item btn btn-danger btn-sm"><i class="fa fa-minus"></i></button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            if (!$one->isNewRecord) {
                                echo Html::activeHiddenInput($one, "[{$i}]id");
                            }
                            ?>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4"> <?= $form->field($one, "[{$i}]name_uz")->textInput(['maxlength' => true]) ?></div>
                                        <div class="col-md-4"> <?= $form->field($one, "[{$i}]name_ru")->textInput(['maxlength' => true]) ?></div>
                                        <div class="col-md-4"> <?= $form->field($one, "[{$i}]name_en")->textInput(['maxlength' => true]) ?></div>
                                        <div class="col-md-4"> <?= $form->field($one, "[{$i}]status")->dropDownList(['1'=>'Active', '0'=>'InActive'],['maxlength' => true]) ?></div>
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
        <?= Html::submitButton($one->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>