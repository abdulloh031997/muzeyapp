<?php

use common\models\CoursBlock;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cours */

$this->title = Yii::t('app', 'Update Cours: {name}', [
    'name' => $modelCours->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cours'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelCours->id, 'url' => ['view', 'id' => $modelCours->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cours-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelCours' => $modelCours,
        'modelsCoursBlock' => (empty($modelsCoursBlock)) ? [new CoursBlock] : $modelsCoursBlock
    ]) ?>

</div>
