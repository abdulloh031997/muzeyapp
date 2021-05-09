<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TitleLang */

$this->title = Yii::t('app', 'Create Title Lang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Title Langs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="title-lang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
