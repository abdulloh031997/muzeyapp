<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Certificate */

$this->title = 'Create Certificate';
$this->params['breadcrumbs'][] = ['label' => 'Certificates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificate-create card p-3">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
