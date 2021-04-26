<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Login page asset bundle.
 */
class CerAsset extends AssetBundle
{

    public $css = [
        'cer/base.min.css',
        'cer/fancy.min.css',
        'cer/main.css',
    ];

    public $js = [
        'cer/compatibility.min.js',
        'cer/theViewer.min.js',
       
    ];

    public $depends = [
    ];
}
