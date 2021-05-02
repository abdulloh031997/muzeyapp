<?php
namespace  frontend\widgets;
use yii\base\Widget;

class NamazWidget extends Widget{
    public function run(){
        return $this->render('namaz');
    }
}