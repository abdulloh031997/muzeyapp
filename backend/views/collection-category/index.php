<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CollectionCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('template', 'category');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="collection-category-index">

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
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'content_id',
            'name',
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'image',
                'format' => 'html',
                'value' => function($model){
                    if($model->image!=''){
                        return \yii\helpers\Html::img($model->getLogo(), ['width'=>129,'background'=>'black']);
                    }
                    else{
                        return \yii\helpers\Html::img('https://howfix.net/wp-content/uploads/2018/02/sIaRmaFSMfrw8QJIBAa8mA-article-600x315.png', ['width'=>129,'background'=>'black']);
                    }
                }
            ],
            [
                'attribute'=>'language',
                'filter'=>ArrayHelper::map(\common\models\Language::find()->where(['status'=>1])->all(), 'lang_code', 'name'),
                'value'=> function($model){
                    return common\models\CollectionCategory::getTranslatedLanguages($model->content_id);
                }
            ],
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
