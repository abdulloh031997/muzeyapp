<?php
namespace  frontend\widgets;

use common\models\Category;
use common\models\Post;
use yii\base\Widget;

class NamazWidget extends Widget{
    public function run(){
        $category = Category::find()->asArray()->all();
        $post = Post::find()->where(['status'=>1])->limit(6)->orderBy(['id'=>SORT_DESC])->asArray()->all();
        return $this->render('namaz',compact('category','post'));
    }
}