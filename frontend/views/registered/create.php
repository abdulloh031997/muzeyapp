<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Registered */

$this->title = Yii::t('app', 'Create Registered');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registereds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="registered-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
