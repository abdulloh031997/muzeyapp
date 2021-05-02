<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CollectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('template', 'collection');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="collection-index">

    <div style="display: flex; justify-content: space-between;">
        <h3><?= Html::encode($this->title) ?></h3>

        <p>
            <?= Html::a(Yii::t('template', 'add'), ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
        </p>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'id',
            'collection_category_id',
            // 'content_id',
            'author',
            //'technique',
            //'materials',
            'language',
            //'size',
            //'status',
            //'created_at',
            //'updated_at',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
