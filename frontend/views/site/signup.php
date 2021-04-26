<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
    <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-white" style="margin-top: 89px">Ro'yxatdan o'tish</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
<div class="container-fluid my-5">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <span class="form-group">
                <?= Html::submitButton('Ro\'yxatdan o\'tish', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </span>
            <span class="ml-3">
                <a href="<?=\yii\helpers\Url::to(['site/login'])?>" class="btn btn-outline-info" style="text-decoration: none"> <i class="fa fa-sign-in-alt"></i> Kirish</a>
            </span>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-4"></div>
    </div>

</div>
