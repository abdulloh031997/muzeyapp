<?php

use yii\helpers\Html;
use common\models\ComplexFans;
/* @var $this yii\web\View */
/* @var $model common\models\Complex */

$this->title = Yii::t('app', 'Create Complex');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Complexes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="complex-create card p-5">
    <?= $this->render('_form', [
        'modelComplex' => $modelComplex,
        'modelsComplexFans' => (empty($modelsComplexFans)) ? [new ComplexFans] : $modelsComplexFans
    ]) ?>

</div>
