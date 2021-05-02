<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/vendor/bootstrap/css/bootstrap.min.css',
        'assets/vendor/icofont/icofont.min.css',
        'assets/vendor/boxicons/css/boxicons.min.css',
        'assets/vendor/animate.css/animate.min.css',
        'assets/vendor/remixicon/remixicon.css',
        'assets/vendor/owl.carousel/assets/owl.carousel.min.css',
        'assets/vendor/venobox/venobox.css',
        'assets/vendor/aos/aos.css',
        'assets/css/style.css',
    ];
    public $js = [
        // 'js/jquery.min.js',
        'assets/vendor/jquery/jquery.min.js',
        'assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
        'assets/vendor/jquery.easing/jquery.easing.min.js',
        'assets/vendor/php-email-form/validate.js',
        'assets/vendor/owl.carousel/owl.carousel.min.js',
        'assets/vendor/venobox/venobox.min.js',
        'assets/vendor/isotope-layout/isotope.pkgd.min.js',
        'assets/vendor/aos/aos.js',
        'assets/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
