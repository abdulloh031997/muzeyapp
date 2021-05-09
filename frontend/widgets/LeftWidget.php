<?php
namespace  frontend\widgets;

use common\models\Category;
use common\models\CollectionCategory;
use common\models\Post;
use yii\base\Widget;

class LeftWidget extends Widget{
    public function run(){
        $category = CollectionCategory::find()->asArray()->all();
        return $this->render('left',compact('category'));
    }
}