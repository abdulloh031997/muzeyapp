<?php

use common\models\Language;
use common\models\Region;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\Registered */
/* @var $form yii\widgets\ActiveForm */

$data = ArrayHelper::map(Region::find()->where(['status' => 1])->all(), 'id', 'name');
$lang = ArrayHelper::map(Language::find()->where(['status' => 1])->all(), 'id', 'name');

?>
<?php
$js = <<< JS
var selector0 = document.getElementById("mask");
var selector1 = document.getElementById("pres");
var selector2 = document.getElementById("pnum");
var im = new Inputmask('+99999-999-99-99');
var pres = new Inputmask('AA');
var pnum = new Inputmask('9999999');
im.mask(selector0);
pres.mask(selector1);
pnum.mask(selector2);
JS;

$this->registerJs($js, $position = yii\web\View::POS_END, $key = null);
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
<div class="registered-form container my-5">

    <?php $form = ActiveForm::begin(); ?>
    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
    <div class="row">
        <div class="col-md-4"><?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'pser')->widget(\yii\widgets\MaskedInput::className(), [
                                    'mask' => 'AA', 'options' => ['id' => 'pres']
                                ]);  ?></div>
        <div class="col-md-4"><?= $form->field($model, 'pnum')->widget(\yii\widgets\MaskedInput::className(), [
                                    'mask' => '9999999', 'options' => ['id' => 'pnum']
                                ]);  ?></div>
        <div class="col-md-4">
            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '+999 99 999 99 99', 'options' => ['id' => 'mask']
            ]); ?>
        </div>
        <div class="col-md-4"><?= $form->field($model, 'workplace')->textInput() ?></div>
        <div class="col-md-4"><?= $form->field($model, 'region_id')->dropDownList($data) ?></div>

        <div class="col-md-4"><?= $form->field($model, 'lang_id')->dropDownList($lang) ?></div>
        <div class="col-md-4">
            <?= $form->field($model, 'codecap')->widget(Captcha::className(), [
                'captchaAction' => '/registered/captcha',
                'imageOptions' => [
                    'id' => 'registered-codecap-image'
                ],
                'template' => '<div class="row">
                                            <div class="col-sm-4" style="padding-top: 0.5em;cursor: pointer;">
                                                 {image}</div>
                                            <div class="col-sm-7">{input}</div></div>',
            ])->label();
            ?>
        </div>
        <div class="col-md-4 pt-4">
            <?= Html::submitButton(Yii::t('app', 'Ro\'yxatdan o\'tish'), ['class' => 'form-control-submit-button']) ?>
        </div>
        <div class="col-md-4"></div>
    </div>


    <?php ActiveForm::end(); ?>

</div>