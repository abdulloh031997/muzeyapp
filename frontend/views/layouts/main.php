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

$data = CoursCategory::find()->where(['status' => 1])->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/images/version.png">
    <!-- SEO Meta Tags -->
    <meta name="description" content="O'ZBEKISTON RESPUBLIKASI VAZIRLAR MAHKAMASI DAVLAT TEST MARKAZI HUZURIDAGI ILMIY-O'QUV AMALIY MARKAZI">
    <meta name="author" content="Abdulloh Bobojonov">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <!-- Website Title -->
    <title>Ilmiy-o'quv amaliy markazi</title>

    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body data-spy="scroll" data-target=".fixed-top">
    <?php $this->beginBody() ?>

    <div class="wrap">
        <!-- Preloader -->
        <div class="spinner-wrapper">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <!-- end of preloader -->

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top bg-light">
            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="<?=Url::to(['/'])?>">
                <img src="/images/version.png" alt="alternative">
                <a href="<?=Url::to(['/'])?>" class="site_name" style="text-align: center;  line-height: normal; text-decoration: none; font-family: sans-serif;">
                    O'ZBEKISTON RESPUBLIKASI <br>
                    VAZIRLAR MAHKAMASI <br>
                    DAVLAT TEST MARKAZI HUZURIDAGI <br>
                    ILMIY-O'QUV AMALIY MARKAZI
                </a>
            </a>

            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mt-4">
                        <a class="nav-link page-scroll" href="<?=Url::to(['/'])?>">Bosh sahifa <span
                                    class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown mt-4">
                        <a class="nav-link dropdown-toggle page-scroll font-weight-bold" href="#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Biz haqimizda</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?=Url::to(['site/team'])?>"><span class="item-text">Rahbariyat</span></a>
                                <div class="dropdown-items-divide-hr"></div>
                                <a class="dropdown-item" href="<?=Url::to(['site/organizational'])?>"><span class="item-text">Ilmiy markaz tashkiliy tuzilmasi</span></a>
                                <div class="dropdown-items-divide-hr"></div>
                        </div>
                    </li>
                    <li class="nav-item mt-4">
                        <a class="nav-link page-scroll" href="<?=Url::to(['site/news'])?>">Yangiliklar</a>
                    </li>
                    <!-- Dropdown Menu -->
                    <?php if (!Yii::$app->user->isGuest): ?>
                    <li class="nav-item dropdown mt-4">
                        <a class="nav-link dropdown-toggle page-scroll font-weight-bold" href="#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Kurslar <span><sub class="online_box"></sub></span></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($data as $key =>$one) :?>
                            <a class="dropdown-item" href="<?=Url::to(['site/kurslar','id'=>$one['id']])?>"><span class="item-text"><?=$one['name_uz']?></span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <?php endif ; ?>
                    <!-- end of dropdown menu -->

                    <li class="nav-item mt-4">
                        <a class="nav-link page-scroll" href="<?=Url::to(['site/contact'])?>">Bog'lanish</a>
                    </li>
                    <?php if (Yii::$app->user->isGuest):?>
                        <li class="nav-item ml-4 mt-3">
                        <a href="<?=Url::to(['site/signup'])?>"  target="_blank" class="nav-link page-scroll text-dark mb-3 btn btn-outline-info" style="text-decoration: none; font-family: Sans-serif; font-size: 14px    margin-top: -7px;">
                            <i class="fa fa-registered"></i> Ro'yxatdan o'tish </a>

                    </li>
                <?php else: ?>
                    <li class="nav-item dropdown mt-3 ml-3">
                        <a class="nav-link dropdown-toggle page-scroll font-weight-bold btn btn-outline-info" href="#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user-alt"></i> &nbsp; <?=Yii::$app->user->identity->username?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?=Html::a(
                                '<i class="fa fa-sign-in-alt"></i> Chiqish',
                                ['/site/logout'],
                                ['class' => 'dropdown-item font-weight-bold', 'data-method' => 'post']
                            );
                            ?>


                        </div>
                    </li>
                <?php endif ?>

                </ul>

            </div>
        </nav>

        <?= $content ?>

        <!-- Footer -->
        <footer class="bg-light text-center text-white">
            <!-- Grid container -->
            <div class="container p-4">
                <section>
                    <div class="text-dark" style="font-family: Sans-serif; font-weight: 400">
                        O‘zbekiston Respublikasi Vazirlar Mahkamasining “Test tizimini takomillashtirishga qaratilgan qo‘shimcha chora-tadbirlar to‘g‘risida” 2020 yil 17 sentyabrdagi 562-son qarori bilan Davlat test markazi huzurida Ilmiy-o‘quv amaliy markazi davlat muassasasi tashkil etilgan.
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <img src="/images/version.png" style="width: 109px" alt="">
                            </div>
                            <div class="col-md-4">
                                 <span class="nav-item ml-4 mt-0">
                                   <a href="tel:+998955156868" target="_blank" class="nav-link page-scroll text-dark btn btn-outline-warning" style="text-decoration: none; font-family: Sans-serif; ">
                                       <img src="/images/telephone.svg" style="width: 15px" alt="">  +998 95 515 68 68</a>
                               </span>
                                <span class="nav-item ml-4 mt-0">
                                        <a href="https://corp.uz/webmail/" target="_blank" class="nav-link page-scroll text-dark btn btn-outline-info" style="text-decoration: none; font-family: Sans-serif;">
                                        <img src="/images/email.svg" style="width: 15px; font-size: large" alt=""></a>
                                        <span/>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- Section: Social media -->
                <section class="m-2">

                              <!-- Facebook -->
                              <a class="btn btn-floating m-1" style="background-color: #05059b; color: aliceblue;" href="https://www.facebook.com/groups/2732862856977770" target="_blank" role="button"><i
                                          class="fab fa-facebook-f"></i></a>
                              <a class="btn btn-floating m-1 " style="background-color: #05059b; color: aliceblue; " href="https://www.instagram.com/ilmiy_markaz/" target="_blank" role="button "><i
                                          class="fab fa-instagram "></i></a>
                              <a class="btn btn-floating m-1" style=" background-color: #05059b; color: aliceblue; " href="https://t.me/dtmilmiymarkaz" target="_blank" role="button "><i class="fab fa-telegram "></i></a>
                              <!-- Linkedin -->

                </section>
                <!-- Section: Social media -->


            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3 " style="background-color:#0a0a2e ">
                © 2021 DTM:
                <a class="text-white " href="https://ilmiy.dtm.uz/ ">ilmiy.dtm.uz</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

        <?php $this->endBody() ?>
        <script>
            window.replainSettings = {
                id: '5dcb57f3-7a37-476f-a5b9-b891abbe745d'
            };
            (function(u) {
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = u;
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
            })('https://widget.replain.cc/dist/client.js');
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-2NC978QTJD"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-2NC978QTJD');
        </script>

</body>

</html>
<?php $this->endPage() ?>