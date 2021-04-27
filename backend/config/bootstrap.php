<?php
function debug($var){
    echo"<pre>";
    print_r($var);
    echo"</pre>";
}
function active_langauges()
{
   $activeLanguages = \common\models\Language::find()->where(['status'=>1])->all();
   return $activeLanguages;
}
function current_lang()
{
    return Yii::$app->language;
}