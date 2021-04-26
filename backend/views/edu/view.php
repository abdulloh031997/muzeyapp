<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Edu */
?>
<div class="edu-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'name_ru',
            'name_qq',
            'organization_id',
            'region_id',
            'shortname',
            'create_at',
            'update_at',
            'count_plan',
            'name_uz',
        ],
    ]) ?>

</div>
