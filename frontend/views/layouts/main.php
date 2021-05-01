<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\models\CoursCategory;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="icon" href="/images/version.png"> -->
    <meta name="description" content="Ўзбекистон амалий санъат ва ҳунармандчилик тарихи музейи.">
    <meta name="author" content="Abdulloh Bobojonov">
    <meta property="og:site_name" content="" />
    <meta property="og:site" content="" /> 
    <meta property="og:title" content="" />
    <meta property="og:description" content="" /> 
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:type" content="article" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <!-- Website Title -->
    <title>Ўзбекистон амалий санъат ва ҳунармандчилик тарихи музейи.</title>
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
        <?= $content ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>