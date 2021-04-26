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
        'css/bootstrap.css',
        'css/fontawesome-all.css',
        'css/swiper.css',
        'css/magnific-popup.css',
        'css/styles.css',
        'css/site.css',
    ];
    public $js = [
        // 'js/jquery.min.js',
        'js/jquery.mask.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/jquery.easing.min.js',
        'js/swiper.min.js',
        'js/jquery.magnific-popup.js',
        'js/validator.min.js',
        'js/scripts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
