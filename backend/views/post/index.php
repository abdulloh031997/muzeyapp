<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index card p-2">



    <p>
        <?= Html::a(Yii::t('app', 'Create Post'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

//            'id',
            'title',
//            'description',
//            'body:ntext',
//            'image',
            //'status',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'noWrap' => true,
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a(
                            '<i class="fas fa-eye"></i>',
                            ['view', 'id' => $model->id],
                            [
                                'data-id' => $model->id,
                                // 'class' => 'btn btn-link',
                                'title' => 'Кўриш',
                                'aria-label' => 'Кўриш',

                            ]
                        );
                    },

                    'update' => function ($url, $model, $key) {
                        return Html::a(
                            '<i class="fas fa-edit"></i>',
                            ['update', 'id' => $model->id],
                            [
                                'data-id' => $model->id,
                                // 'class' => 'btn btn-link',
                                'title' => 'Таҳрирлаш',
                                'aria-label' => 'Таҳрирлаш',

                            ]
                        );
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a(
                            '<i class="fas fa-trash"></i>',
                            ['delete', 'id' => $model->id],
                            [
                                'class' => 'label btn-link',
                                'data' => [
                                    'confirm' => 'O\'chirish',
                                    'method' => 'post',
                                ],
                                'title' => 'O\'chirish ',
                                'aria-label' => 'O\'chirish',

                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
