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
    <?= \frontend\widgets\HeaderWidget::widget() ?>
      <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Muzeyart</span></h2>
          <p class="animate__animated animate__fadeInUp"> Ўзбекистон амалий санъат ва ҳунармандчилик тарихи музейи. Ўзбекистон Республикаси Маданият  вазирлиги тизимидаги Ўзбекистон амалий санъат ва ҳунармандчилик тарихи музейи мамлакатимизда ўзига хос  ягона музейлардан ҳисобланади.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Batafsil</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Ўзбекистон амалий санъат ва ҳунармандчилик тарихи музейи.</h2>
          <p class="animate__animated animate__fadeInUp"> Ўзбекистон амалий санъат ва ҳунармандчилик тарихи музейи. Ўзбекистон Республикаси Маданият  вазирлиги тизимидаги Ўзбекистон амалий санъат ва ҳунармандчилик тарихи музейи мамлакатимизда ўзига хос  ягона музейлардан ҳисобланади.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Batafsil</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Ўзбекистон амалий санъат ва ҳунармандчилик тарихи музейи.</h2>
          <p class="animate__animated animate__fadeInUp"> Ўзбекистон амалий санъат ва ҳунармандчилик тарихи музейи. Ўзбекистон Республикаси Маданият  вазирлиги тизимидаги Ўзбекистон амалий санъат ва ҳунармандчилик тарихи музейи мамлакатимизда ўзига хос  ягона музейлардан ҳисобланади.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Batafsil</a>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->
  <!-- <div class="container-fluid mt-0" >
    <div class="row">
      <div class="col-md-12">
        <div class="owl-carousel owl-theme" id="banner_car">
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/slides/10.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/slides/10.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/slides/10.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
      </div>
      </div>
    </div>
  </div>  -->
    <main id="main">
        <?= $content ?>
    </main>
    <?= \frontend\widgets\FooterWidget::widget() ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>