<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Logo */
/* @var $form yii\widgets\ActiveForm */
$languages = active_langauges();
$langs_array = ArrayHelper::map(\common\models\Language::find()->where(['status'=>1])->all(), 'lang_code', 'name');
if ($model->image == '') {
    $path = 'https://guide-group.ru/uploads/posts/2018-09/1535899253_404-image-2x.png';
} else {
    $path = '@fronted_domain/' . $model->image;
}
if ($model->file != '') {
    $path1 = Yii::getAlias('@fronted_domain'). '/' . $model->file;
}else{
    $path1 = '';
}
?>

<div class="logo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified mb-3" role="tablist">
                        <?php foreach ($languages as $index => $lang): ?>
                            <li class="nav-item">
                                <a class="nav-link <?=$index== 0 ? 'active' : '' ?>" data-toggle="tab" id="<?=$lang->lang_code?>" href="#general<?=$lang->lang_code?>" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block"><?=$lang->name?></span>
                                </a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                        <div class="tab-content">
                            <!-- Tab item -->
                            <?php foreach ($languages as $index => $lang): ?>
                            <?php if (!$model->isNewRecord) {
                                $getValue = \common\models\Logo::getValue($_GET['id'], $lang->lang_code);
                            }?>

                                <div class="tab-pane <?=$index== 0 ? 'active' : '' ?>" id="general<?=$lang->lang_code?>" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group required-field">
                                                <?= $form->field($model, "name[$lang->lang_code]")
                                                    ->textInput(['value'=>(!$model->isNewRecord)?$getValue['name']:''])
                                                    ->label('Name '.$lang->name)
                                                ?>
                                            </div>
                                        </div>
                                    </div>  
                                </div> 
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div id="file" class="col-md-12">
                                    <?=Html::img($path, [
                                        'style' => 'width:80%; height:250px; margin-top: 5px; margin-left: -5px; border-radius:5px;',
                                        'class' => '',
                                    ])?>
                                </div>
                                <div class="mt-3">
                                    <?= $form->field($model, 'file')->fileInput(['maxlength' => true,'class'=>'image_input form-control']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <?= $form->field($model, 'status')->dropDownList($model->statusArray()) ?>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs(<<<JS
    
$(document).ready(function(){
    var fileCollection = new Array();

    $(document).on('change', '.image_input', function(e){
        var files = e.target.files;
        $.each(files, function(i, file){
            fileCollection.push(file);
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){
                var template = '<img style="width:100%; height:auto;margin-top:20px; border-radius:5px;" src="'+e.target.result+'" class=""> ';
                $('#file').html('');
                $('#file').append(template);
            };
        });
    });
});
JS
);
?>