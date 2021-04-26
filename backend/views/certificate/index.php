<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\switchinput\SwitchInput;
use yii\widgets\LinkPager;
use backend\components\CustomPagination;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CertificateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Certificates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificate-index card p-3">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'condensed' => true,
        'hover' => true,
        //        'pjax'=>true,
        'tableOptions' => ['class' => 'table-sm'],
        'panel' => [
            'type' => GridView::TYPE_ACTIVE,
            'before' => '{summary}',
            'after' => false,
            'summaryOptions' => [
                'class' => 'float-left',
                'style' => 'display: table; height: 38px;'
            ]
        ],
        'toolbar' => [
            '<div style="align-self: center;">&nbsp;' .
                Html::a('<i class="fa fa-lg fa-plus"></i>', ['create'], ['class' => 'btn pl-2 pr-2 btn-success create-specials']) .
                Html::a('<i class="fa fa-lg fa-print"></i>', ['list'], ['class' => 'btn pl-2 pr-2 ml-1 btn btn-primary', 'target' => 'blank']) .
                '&nbsp; &nbsp; {toggleData} &nbsp; {export}</div>'
        ],
        'panelTemplate' => '{panelBefore}{items}{panelAfter}{panelFooter}',
        'exportConfig' => [
            GridView::EXCEL => [
                'label' => '&nbsp;&nbsp;Excel',
            ],
        ],
        'export' => [
            'icon' => 'fas fa-external-link-alt',
            'fontAwesome' => true,
        ],
        'toggleDataOptions' => [
            'all' => ['icon' => 'fa fa-expand'],
            'page' => ['icon' => 'fa fa-compress'],
        ],
        'showPageSummary' => true,
        'summaryOptions' => [
            'class' => 'summary',
            'style' => 'display: table-cell; vertical-align:middle;'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'lname',
            'fname',
            'mname',
            
            // 'bdate',
            'psser',
            'phone',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    return SwitchInput::widget(
                        [
                            'name' => 'ser',
                            'pluginEvents' => [
                                'switchChange.bootstrapSwitch' => "function(e){sendRequest($model->ser, $model->id);}"
                            ],

                            'pluginOptions' => [
                                'size' => 'mini',
                                'onColor' => 'success',
                                'offColor' => 'danger',
                                'onText' => 'Berildi',
                                'offText' => 'Berilmadi'
                            ],
                            'value' => $model->ser
                        ]
                    );
                }
            ],

            // 'special',
            // 'workplace',
            //'psnum',
            //'imie',
            //'create_at',
            //'update_at',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{print} {view} {update} {delete}',
                'noWrap' => true,
                'buttons' => [
                    'print' => function ($url, $model) {
                        $url = Url::toRoute(['/certificate/print', 'id' => $model->id]);
                        return Html::a(
                            '<span class="fa fa-print"></span>',
                            $url,
                            [
                                'title' => 'Печать',
                                'data-pjax' => '0',
                                'target' => '_blank',
                            ]
                        );
                    },

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

</div>
<?php
$js = <<< JS
function sendRequest(ser, id){
    $.ajax({
        url:'/certificate/ser',
        method:'post',
        data:{ser:ser,id:id},
        success:function(data){
            console.log(ser);
            // if(data.ser == 1){
            //     alert("Sertifikatni bekor qilasizmi?");
            // }
            // else{
            //     alert("Sertifikat berasimi?");
            // }
        },
        error:function(jqXhr,status,error){
            alert(error);
        }
    });
}
JS;
$this->registerJs($js, \yii\web\View::POS_READY);


?>