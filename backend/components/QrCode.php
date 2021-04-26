<?php
namespace backend\components;

use Yii;

/**
 * Description of QrCode
 *
 * @author muhammad
 */
class QrCode extends \yii\base\BaseObject {
    
    public static function getQrCodeImageUrl($text, $filename){

        include_once Yii::getAlias('@backend').'/components/phpqrcode/qrlib.php';
        
        chdir(Yii::getAlias('@backend'));
        return \QRcode::svg($text);
        
//        return Yii::getAlias('@web')."/qrcode/{$filename}.svg";
    }
}
