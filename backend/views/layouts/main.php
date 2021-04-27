<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script type="text/javascript">
        window.baseUrl = '<?= Yii::$app->homeUrl ?>';
    </script>
</head>
<body data-sidebar="dark">
<?php $this->beginBody() ?>
<div id="layout-wrapper">
    <?= \backend\widgets\HeaderWidget::widget(); ?>
    <!-- Left Sidebar Start -->
    <?= \backend\widgets\SidebarWidget::widget(); ?>
    <!-- Left Sidebar End -->
    <div class="main-content">
        <div class="page-content">
            <div class="content-header">
                <?= \backend\widgets\BreadcrumbWidget::widget(); ?>
            </div>
            <div class="container-fluid py-3 card">
                <?= $content ?>
            </div>
        </div>

        <?= \backend\widgets\FooterWidget::widget(); ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
