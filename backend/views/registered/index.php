<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegisteredSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Registereds');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registered-index card p-2">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

//            'id',
            'name',
            'lastname',
            'fname',
            'pser',
            //'pnum',
            'region_id',
//            [
//                'attribute' => 'region_id',
////                'format' => 'text',
////                'filterInputOptions' => ['class' => 'form-control input-sm'],
//                'value' => function ($model) {
//                    return $model->region->name;
//                },
//                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Region::find()->all(), 'id', 'name'),
//                'filterType' => GridView::FILTER_SELECT2,
//                'filterWidgetOptions' => [
//                    'options' => [
//                            'prompt' => '--'
//                    ],
//                    'pluginOptions' => ['allowClear' => false],
//                ],
//            ],
            [
                'attribute' =>'type',
                'value' =>function($model)
                {
                    return $model->coursBlock->name_uz;
                }
            ],
//            'type',
            //'lang_id',
            //'status',
            //'created_at',
            //'updated_at',
            'phone',
            //'workplace',

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
