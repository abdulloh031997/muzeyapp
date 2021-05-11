<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Registred */

$this->title = $model->name.' '.$model->fname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registreds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section>
    <div class="p-5 bg-dark"></div>
    <div class="p-3 bg-dark">
      <h5 class="text-white text-center p-4"><a href="" class="text-warning"><b>Бош саҳифа</b></a> | Онлайн буюртма</h5>
    </div>
</section>
<div class="registred-view container">

    <div style="display: flex; justify-content: space-between;">
        <h3><?= Html::encode($this->title) ?></h3>

        <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        </p>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'fname',
            'email:email',
            'phone',
            'date_of_visit',
            'number_of_visit',
            'institution_name',
            'type',
            'lang',
            'status',
        ],
    ]) ?>

</div>
