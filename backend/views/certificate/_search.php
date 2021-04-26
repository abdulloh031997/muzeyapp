<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CertificateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="certificate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lname') ?>

    <?= $form->field($model, 'fname') ?>

    <?= $form->field($model, 'mname') ?>

    <?= $form->field($model, 'bdate') ?>

    <?php // echo $form->field($model, 'psser') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'special') ?>

    <?php // echo $form->field($model, 'workplace') ?>

    <?php // echo $form->field($model, 'psnum') ?>

    <?php // echo $form->field($model, 'imie') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'update_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
