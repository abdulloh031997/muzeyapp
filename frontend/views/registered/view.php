<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Registered */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registereds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$script = <<< JS
$( document ).ready(function() {

$( "#showToast" ).click(function() {
  $('.toast').toast('show');
});
  
});;
JS;
$url = Yii::getAlias("@fronted_domain");

$secret = 'jPWzod86fqbG7';
$date = date("Y-m-d h:i:s");
$merchantID = "12885";
$merchantUserID = "19678";
$serviceID = "17793";
$transID = "";
$transAmount = number_format("10000", 2, '.', '');
$signString = md5($date . $secret . $serviceID . $transID . $transAmount);
$returnURL = "<RETURNURL>";
?>


<!-- end of header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-white" style="margin-top: 89px"><?= $model->cours->name_uz . ' ga ro\'yxatdan o\'tdingiz !' ?></h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<div class="registered-view container">
    <div style="display: flex; justify-content: space-between;padding:10px 0px ;">
        <div style="font-weight: bold;"><?= $model->name . ' ' . $model->lastname . ' ' . $model->fname ?></div>

        <div>
            <?= Html::a(Yii::t('app', 'O\'zgartirish <i class="fa fa-edit"></i>'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary font-weight-bold', 'style' => 'text-decoration:none']) ?>
            <a href="<?= $url . '/uploads/shartnoma/shartnoma.pdf' ?>" download class="btn btn-warning text-white font-weight-bold">Shartnomani yuklab olish <i class="fa fa-download"></i></a>


        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'name',
            'lastname',
            'fname',
            'pser',
            'pnum',
            // 'region_id',
            [
                'attribute' => 'region_id',
                'value' => function ($model) {
                    return $model->region->name;
                }
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->cours->name_uz;
                }
            ],
            [
                'attribute' => 'lang_id',
                'value' => function ($model) {
                    return $model->lang->name;
                }
            ],

            'phone',
            'workplace',
            [
                'attribute' => 'Narxi',
                'value' => function ($model) {
                    if ($model->type == 1){
                        return "275 ming so'm";
                    }
                    elseif ($model->type == 2){
                        return "275 ming so'm";
                    }
                    elseif ($model->type == 3){
                        return "275 ming so'm";
                    }
                    elseif ($model->type == 4){
                        return "253 ming so'm";
                    }
                    elseif ($model->type == 5){
                        return "253 ming so'm";
                    }
                    elseif ($model->type == 6){
                        return "275 ming so'm";
                    }
                }
            ],
            // 'created_at',
            // 'updated_at',
        ],
    ]) ?>
    <div style="font-weight: bold;">
        Payme orqali to'lash
    </div>
    <BR>
    <form method="POST" action="https://checkout.paycom.uz">
        <input type="hidden" name="merchant" value="603cc83832b9d27ba076c1df" />
        <?php if ($model->type == 1) : ?>
            <input type="hidden" name="amount" value="27500000" />
        <?php elseif ($model->type == 2) : ?>
            <input type="hidden" name="amount" value="27500000" />
        <?php elseif ($model->type == 3) : ?>
            <input type="hidden" name="amount" value="27500000" />
        <?php elseif ($model->type == 4) : ?>
            <input type="hidden" name="amount" value="25300000" />
        <?php elseif ($model->type == 5) : ?>
            <input type="hidden" name="amount" value="25300000" />
        <?php elseif ($model->type == 6) : ?>
            <input type="hidden" name="amount" value="27500000" />
        <?php endif ?>
        <input type="hidden" name="account[full_name]" value="<?= $model->name . ' ' . $model->lastname . ' ' . $model->fname ?>" />

        <input type="hidden" name="account[account]" value="<?= $model->phone ?>" />

        <input type="hidden" name="account[payment_for]" value="<?= $model->cours->name_uz ?>" />

        <input type="hidden" name="account[inn]" value="" />


        <button type="submit"   target="_blank"  style="cursor: pointer;border: 1px solid #ebebeb;border-radius: 6px;background: linear-gradient(to top, #f1f2f2, white);width: 200px;height: 42px;display: flex;align-items: center;justify-content: center;">
            <img style="width: 160px;height: 20px;" target="_blank" src="http://cdn.payme.uz/buttons/button_big_UZ_LATN_UZ.svg"> </button>


    </form>

    <br>
    <br>
    <div style="font-weight: bold;">
        Click orqali to'lash
    </div>
    <br>
    <form id="click_form" action="https://my.click.uz/services/pay" method="get" target="_blank">
        <?php if ($model->type == 1) : ?>
            <input type="hidden" name="amount" value="<?=number_format(275000, 2, '.', '')?>" />
        <?php elseif ($model->type == 2) : ?>
            <input type="hidden" name="amount" value="<?=number_format(275000, 2, '.', '')?>" />
        <?php elseif ($model->type == 3) : ?>
            <input type="hidden" name="amount" value="<?=number_format(275000, 2, '.', '')?>" />
        <?php elseif ($model->type == 4) : ?>
            <input type="hidden" name="amount" value="<?=number_format(253000, 2, '.', '')?>" />
        <?php elseif ($model->type == 5) : ?>
            <input type="hidden" name="amount" value="<?=number_format(253000, 2, '.', '')?>" />
        <?php elseif ($model->type == 6) : ?>
            <input type="hidden" name="amount" value="<?=number_format(275000, 2, '.', '')?>" />
        <?php endif ?>
        <input type="hidden" name="merchant_id" value="<?=$model->cours->name_uz?>"/>
        <input type="hidden" name="merchant_user_id" value="<?=$model->name ?>"/>
        <input type="hidden" name="service_id" value="17793"/>
        <input type="hidden" name="transaction_param" value="<?=$model->cours->name_uz?>"/>
        <input type="hidden" name="return_url" value=""/>
        <input type="hidden" name="card_type" value="uzcard"/>
        <button type="submit" class="click_logo"><i></i>Оплатить через CLICK</button>
    </form>
    <br>
    <br>
</div>

<style>
    .click_logo {
        padding:4px 10px;
        cursor:pointer;
        color: #fff;
        line-height:190%;
        font-size: 13px;
        font-family: Arial;
        font-weight: bold;
        text-align: center;
        border: 1px solid #037bc8;
        text-shadow: 0px -1px 0px #037bc8;
        border-radius: 4px;
        background: #27a8e0;
        background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzI3YThlMCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMxYzhlZDciIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
        background: -webkit-gradient(linear, 0 0, 0 100%, from(#27a8e0), to(#1c8ed7));
        background: -webkit-linear-gradient(#27a8e0 0%, #1c8ed7 100%);
        background: -moz-linear-gradient(#27a8e0 0%, #1c8ed7 100%);
        background: -o-linear-gradient(#27a8e0 0%, #1c8ed7 100%);
        background: linear-gradient(#27a8e0 0%, #1c8ed7 100%);
        box-shadow:  inset    0px 1px 0px   #45c4fc;
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#27a8e0', endColorstr='#1c8ed7',GradientType=0 );
        -webkit-box-shadow: inset 0px 1px 0px #45c4fc;
        -moz-box-shadow: inset  0px 1px 0px  #45c4fc;
        -webkit-border-radius:4px;
        -moz-border-radius: 4px;
    }
    .click_logo i {
        background: url(https://m.click.uz/static/img/logo.png) no-repeat top left;
        width:30px;
        height: 25px;
        display: block;
        float: left;
    }
</style>