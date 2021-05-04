<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
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
            // 'content_id',
            //'technique',
            //'materials',
            [
                'attribute'=>'collection_category_id',
                'filter'=>ArrayHelper::map(\common\models\CollectionCategory::find()->where(['status'=>1])->all(), 'id', 'name'),
                'value'=> function($model){
                    return $model->collectionCategory->name;
                }
            ],
            'name',
            'author',
            [
                'attribute'=>'language',
                'filter'=>ArrayHelper::map(\common\models\Language::find()->where(['status'=>1])->all(), 'lang_code', 'name'),
                'value'=> function($model){
                    return common\models\Category::getTranslatedLanguages($model->content_id);
                }
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'image',
                'format' => 'html',
                'value' => function($model){
                    if($model->image!=''){
                        return \yii\helpers\Html::img($model->getLogo(), ['width'=>100,'background'=>'black']);
                    }
                    else{
                        return \yii\helpers\Html::img('https://howfix.net/wp-content/uploads/2018/02/sIaRmaFSMfrw8QJIBAa8mA-article-600x315.png', ['width'=>129,'background'=>'black']);
                    }
                }
            ],
            [
                'attribute'=>'status',
                'format'=>'html',
                'filter'=>[ "1"=>"Active", "5"=>"Pending", "0"=>"InActive" ],
                'value'=> function($model){
                    if($model->status ==5){
                        return '<div class="badge badge-soft-warning font-size-12">Pending</div>';
                    }
                    elseif($model->status ==1){
                        return '<div class="badge badge-soft-success font-size-12">Active</div>'; 
                    }
                    elseif($model->status ==0){
                        return '<div class="badge badge-soft-danger font-size-12">InActive</div>'; 
                    }
                }
            ],
            //'size',
            //'status',
            //'created_at',
            //'updated_at',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'noWrap' => true,
                'buttons' => [

                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-eye"></i>', ['view', 'id' =>$model->content_id],
                            [
                                'data-id' => $model->id,
                                // 'class' => 'btn btn-link',
                                'title' => 'Кўриш',
                                'aria-label' => 'Кўриш',

                            ]);
                    },

                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-edit"></i>', ['update', 'id' => $model->content_id],
                            [
                                'data-id' => $model->id,
                                // 'class' => 'btn btn-link',
                                'title' => 'Таҳрирлаш',
                                'aria-label' => 'Таҳрирлаш',

                            ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->content_id],
                            [
                                'class' => 'label btn-link',
                                'data' => [
                                    'confirm' => 'Вы уверены, что хотите удалить этот элемент ?',
                                    'method' => 'post',
                                ],
                                'title' => 'Ўчириш',
                                'aria-label' => 'Ўчириш',

                            ]);
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
