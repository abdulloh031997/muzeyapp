<?php
  function numberTowords($num){
    $ones = [
        0 => "nol", 1 => "bir", 2 => "ikki", 3 => "uch", 4 => "to‘rt", 5 => "besh", 6 => "olti", 7 => "yetti", 8 => "sakkiz", 9 => "to‘qqiz", 10 => "o‘n", 11 => "o‘n bir", 12 => "o‘n ikki", 13 => "o‘n uch", 14 => "o‘n to'rt", 15 => "o‘n besh", 16 => "o‘n olti", 17 => "o‘n yetti", 18 => "o‘n sakkiz", 19 => "o‘n to‘qqiz", "014" => "o‘n to‘rt"
    ];
    $tens = [0 => "nol", 1 => "o‘n", 2 => "yigirma", 3 => "o‘ttiz", 4 => "qiriq", 5 => "ellik", 6 => "oltmish", 7 => "yetmish", 8 => "sakson", 9 => "to‘qson",];
    $hundreds = ["yuz", "ming", "million", "milliard", "trillion",];
    $num = number_format($num,2,".",",");
    $num_arr = explode(".",$num);
    $wholenum = $num_arr[0];
    $decnum = $num_arr[1];
    $whole_arr = array_reverse(explode(",",$wholenum));
    krsort($whole_arr,1);
    $rettxt = "";
    if ($wholenum == 0)
        $rettxt = 'nol';
    foreach($whole_arr as $key => $i){

        while(substr($i,0,1)=="0")
            $i=substr($i,1,5);
        if($i < 20 && !empty($ones[$i])){
            /* echo "getting:".$i; */
            $rettxt .= $ones[$i];
        }elseif($i < 100){
            if(!empty($i) && substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)];
            if(!empty($i) && substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)];
        }else{
            if(!empty($i) && substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0];
            if(!empty($i) && substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)];
            if(!empty($i) && substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)];
        }
        if($key > 0){
            $rettxt .= " ".$hundreds[$key]." ";
        }
    }
    $rettxt .= ' so‘m ';
    $decnum = $decnum + 0;
    if($decnum > 0){
        if($decnum < 20){
            $rettxt .= $ones[$decnum];
        }elseif($decnum < 100){
            $rettxt .= $tens[substr($decnum,0,1)];
            $rettxt .= " ".$ones[substr($decnum,1,1)];
        }
    } else
        $rettxt .= 'nol';
    return $rettxt.' tiyin';
}
function cleartext($text) {
    $text = str_replace('’', '', $text);
    $text = str_replace('‘', '', $text);
    $text = preg_replace("/[^A-Za-z0-9 ]/", '', $text);
    $text = str_replace(' ', '%20', $text);
    return $text;
}
function current_lang()
{
    return Yii::$app->language;
}
/*get all active languages*/
function active_langauges()
{
   $activeLanguages = \common\models\Language::find()->where(['status'=>1])->all();
   return $activeLanguages;
}