<?php
namespace app\components;

use Yii;

class MyApplication extends \yii\web\Application
{
    public function handleRequest($request)
    {
        if (!$request->isSecureConnection) {
            $secureUrl= str_replace('http', 'https', $request->absoluteUrl);
            return Yii::$app->getResponse()->redirect($secureUrl, 301);
        } else {
            return parent::handleRequest($request);
        }
    }
}