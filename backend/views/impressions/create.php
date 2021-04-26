<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Impressions */

$this->title = Yii::t('app', 'Create Impressions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Impressions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="impressions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
