<?php
namespace frontend\components;

use yii\helpers\Url;

class Helper {
    public static function createMultilanguageReturnUrl($lang = 'cryl') {
        if (count($_GET) > 0) {
            $arr = $_GET;
            $arr['language'] = $lang;
        } else{
            $arr = array('language' => $lang);
        }
        
        $arr = [0=>NULL] + $arr;
        
        return Url::to($arr);
    }
}