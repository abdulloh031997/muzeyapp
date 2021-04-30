<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('template', 'menu');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

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
            'name',
            // 'content_id',
            // 'parent_id',
            'link',
            [
                'attribute'=>'language',
                'filter'=>ArrayHelper::map(\common\models\Language::find()->where(['status'=>1])->all(), 'lang_code', 'name'),
                'value'=> function($model){
                    return common\models\Menu::getTranslatedLanguages($model->content_id);
                }
            ],
            //'c_order',
            //'target_blank',
            //'visible_top',
            //'slug',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
