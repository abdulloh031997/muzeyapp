<?php

namespace app\components;

use Yii;
use yii\helpers\Html;

/**
 * Description of Combobox
 *
 * @author muhammad
 */
    class Combobox
    {
    public static $script = "";

    /**
     * Renders the widget.
     */
    public static function widget(&$view, $model, $attribute, $items)
    {
        $modelName = explode('\\',get_class($model));
        $modelName = end($modelName);
        $modelName = (new \ReflectionClass($model))->getShortName();
        
        $modelNameL = strtolower($modelName);
        $attributeL = strtolower($attribute);
        
        $label = (isset($model->attributeLabels()[$attribute]) ? $model->attributeLabels()[$attribute] : $attribute);
        
        echo <<<asd
        <div class="form-group field-{$modelNameL}-{$attributeL} required">
            <label class="control-label" for="{$modelNameL}-{$attributeL}">{$label}</label>
            <input type='text' id='{$modelNameL}-{$attributeL}' name="{$modelName}[{$attribute}]">
            <div class="help-block"></div>
        </div>
asd;
        
        $button_imgUrl = Yii::getAlias('@web/components/jquery.ajax-combobox/lib/btn.png');
        $data = \yii\helpers\Json::encode($items);
        
        if($model->$attribute !== null and $model->$attribute !== ""){
            if(isset($_POST[$modelName][$attribute])){
                //update
                if(isset($_POST[$modelName]["{$attribute}_primary_key"]) and $_POST[$modelName]["{$attribute}_primary_key"] !== null and $_POST[$modelName]["{$attribute}_primary_key"] !== ""){
                    $init_record = "init_record:'{$_POST[$modelName]["{$attribute}_primary_key"]}'";
                }else{
                    $init_record = "bunaqa_option_yuq:1";
                }
            }else{
                //insert
                $init_record = "init_record:'{$model->$attribute}'";
            }
        }else{
            $init_record = "bunaqa_option_yuq:1";
        }
        self::$script .= <<< js
            $('#{$modelNameL}-{$attributeL}').ajaxComboBox(
                {$data},
                {
                    button_img:'{$button_imgUrl}',
                    $init_record,
                    lang: 'en',
                    per_page: 40,
//                    navi_simple:true,
                }
            );
js;
    }
    
    public static function writeScripts(&$view){
        $view->registerCssFile('@web/components/jquery.ajax-combobox/lib/jquery.ajax-combobox.css');
//        $this->registerJsFile('@web/components/jquery.ajax-combobox/lib/jquery.ajax-combobox.7.3.1.js', ['position' => \yii\web\View::POS_END]);
        $comboboxUrl = Yii::getAlias('@web/components/jquery.ajax-combobox/lib/jquery.ajax-combobox.7.3.1.js');
        
        $script = self::$script;
        $view->registerJs(<<< js
            $.getScript( "{$comboboxUrl}", function() {
                {$script}
            });
js
        );
                
        $script = '';
    }
    
    public static function writeToBase($attribute, $value, $modelName, $postModelName = null, $modelPrimaryKey = 'id', $modelField = 'name'){
        
        if($postModelName === null){
            $postModelName = (new \ReflectionClass(debug_backtrace()[1]['class']))->getShortName();
        }else{
            $postModelName = (new \ReflectionClass($postModelName))->getShortName();
        }
        
        if($_POST[$postModelName]["{$attribute}_primary_key"] != null){
            return $_POST[$postModelName]["{$attribute}_primary_key"];
        }else{
            //find like to this
            $value = trim(preg_replace('/([\s]{2,})/', ' ', str_replace(chr(194).chr(160),' ',$value)));
            
            $id = $modelName::find()
                ->where("LOWER(trim(`{$modelField}`)) = LOWER(trim('".str_replace("\\", "\\\\", $value)."'))")
                ->select($modelPrimaryKey)
                ->scalar();
            if($id){
                return $id;
            }else{
                //add new
                $model = new $modelName;
                $model->$modelField = $value;
                if($model->save()){
                    return $model->$modelPrimaryKey;
                }else{
                    return FALSE;
                }
            }
        }
    }
        
}
