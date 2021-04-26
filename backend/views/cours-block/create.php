<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CoursBlock */

$this->title = Yii::t('app', 'Create Cours Block');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cours Blocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cours-block-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
