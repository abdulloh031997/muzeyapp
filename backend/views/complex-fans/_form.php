<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ComplexFans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="complex-fans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fan_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ball')->textInput() ?>

    <?= $form->field($model, 'block_order')->textInput() ?>

    <?= $form->field($model, 'complex_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
