<?php
namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@backend/assets/';

    public $css = [
        'dist/libs/select2/css/select2.min.css',
        'dist/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css',
        'dist/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
        'dist/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css',
        'dist/libs/sweetalert2/sweetalert2.min.css',
        'dist/libs/magnific-popup/magnific-popup.css',
        'dist/libs/toastr/build/toastr.min.css',
        'dist/css/bootstrap.min.css',
        'dist/css/icons.min.css',
        'theme/animate.min.css',
        'theme/components/media-browser/style.css',
        
    ];

    public $js = [
        'dist/libs/bootstrap/js/bootstrap.bundle.min.js',
        'dist/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
        'dist/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
        'dist/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js',
        'dist/libs/bootstrap-maxlength/bootstrap-maxlength.min.js',
        'dist/libs/metismenu/metisMenu.min.js',
        'dist/libs/simplebar/simplebar.min.js',
        'dist/libs/node-waves/waves.min.js',
        'dist/libs/sweetalert2/sweetalert2.min.js',
        'dist/libs/select2/js/select2.min.js',
        'dist/libs/magnific-popup/jquery.magnific-popup.min.js',
        'dist/js/pages/lightbox.init.js',
        'dist/libs/toastr/build/toastr.min.js',
        'dist/js/gp-link.min.js',
        'dist/js/numeral.min.js',
        'dist/js/pages/form-advanced.init.js',
        'theme/components/media-browser/init.js',

        
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

    public function init()
    {
        parent::init();

        $this->js[] = 'dist/js/app.js';
        $this->js[] = 'theme/components/table-actions.js';
        $this->js[] = 'theme/functions.js';
        $this->js[] = 'theme/scripts.js';
        $this->css[] = 'dist/css/app.min.css';
        $this->css[] = 'theme/style.css';
    }
}
