<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Registred */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registred-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true,'class'=>'border form-control']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>    
            <div class="col-md-6">
                <?= $form->field($model, 'date_of_visit')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'number_of_visit')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'institution_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'type')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'lang')->textInput() ?>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Юбориш'), ['class' => 'btn btn-warning btn-sm']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
