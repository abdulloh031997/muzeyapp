<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Registred */

$this->title = Yii::t('app', 'Create Registred');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registreds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registred-create">
<section>
    <div class="p-5 bg-dark"></div>
    <div class="p-3 bg-dark">
      <h5 class="text-white text-center p-4"><a href="" class="text-warning"><b>Бош саҳифа</b></a> | Онлайн буюртма</h5>
    </div>
</section>
<div class="container">
    <p style="font-family: sans-serif; ">
    Ташрифчиларни қабул қилиш соатлари: <span style="font-weight:bold">09:00 дан 17:00 гача</span> <br>
    Тушлик вақти: <span style="font-weight:bold">13:00 дан 14:00 гача</span> <br>
    Дам олиш куни: <span style="font-weight:bold">Душанба</span><br>
    </p>
</div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
