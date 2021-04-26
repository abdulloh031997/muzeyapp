<?php

use common\models\CoursBlock;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cours */

$this->title = Yii::t('app', 'Create Cours');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cours'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cours-create">
    <?= $this->render('_form', [
        'modelCours' => $modelCours,
        'modelsCoursBlock' => (empty($modelsCoursBlock)) ? [new CoursBlock()] : $modelsCoursBlock
    ]) ?>

</div>
