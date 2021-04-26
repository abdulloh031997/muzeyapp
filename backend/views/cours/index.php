<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CoursSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = Yii::t('app', 'Cours');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    img.cours {
        width: 50px ;
    }

</style>
<div class="cours-index card p-2">

    <p>
        <?= Html::a(Yii::t('app', 'Create Cours'), ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'id',
            'name_uz',
//            'name_ru',
//            'name_en',
            [
                'attribute' =>'image',
                'format' =>'html',
                'value' =>function($model){
                    $url = Yii::getAlias("@fronted_domain");
                        return Html::img($url.'/'.$model->image,['class' =>'cours','width=>20px','height=>20px']);

                }
            ],
            [
            'attribute' =>'status',
            'format'=>'raw',
            'value' =>function($model){
                    if ($model->status ==1){
                        return '<span class="badge-success badge">Active</span>';
                    }
                    else{
                        return '<span class="badge-warning badge">Active</span>';
                    }
                }
            ],
//            'status',

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
