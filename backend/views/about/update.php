<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\About */

$this->title = Yii::t('app', 'Update About: {id}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Abouts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="about-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
