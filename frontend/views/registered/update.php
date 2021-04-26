<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Registered */


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registereds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="registered-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
