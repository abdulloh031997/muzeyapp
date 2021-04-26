<?php

use yii\helpers\Html;

/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS', DIRECTORY_SEPARATOR);


function debug($model, $id = null)
{
    if ($id == 1) {
        echo '<pre>';
        print_r($model);
        echo '</pre>';
    } elseif ($id == 2) {
        echo '<pre>';
        print_r($model);
        echo '</pre>';
        die();
    } else {
        echo '<pre>';
        var_dump($model);
        echo '</pre>';
    }
}

function getAgoTime($time)
{
    $created_at = time() - $time; // to get the time since that moment
    $created_at = ($created_at < 1) ? 1 : $created_at;
    $tokens = array(
        31536000 => Yii::t('app', 'год'),
        2592000 => Yii::t('app', 'месяц'),
        604800 => Yii::t('app', 'неделя'),
        86400 => Yii::t('app', 'день'),
        3600 => Yii::t('app', 'час'),
        60 => Yii::t('app', 'минута'),
        1 => Yii::t('app', 'секунда')
    );
    foreach ($tokens as $unit => $text) {
        if ($created_at < $unit)
            continue;
        $numberOfUnits = floor($created_at / $unit);
        if ($numberOfUnits > 1) {
            if ($text == 'день') {
                $text = 'дня';
            } elseif ($text == 'год') {
                $text = 'года';
            } elseif ($text == 'месяц') {
                $text = 'месяца';
            } elseif ($text == 'неделя') {
                $text = 'недели';
            } elseif ($text == 'час') {
                $text = 'часа';
            } elseif ($text == 'минута') {
                $text = 'минуты';
            } elseif ($text == 'секунда') {
                if ($numberOfUnits > 1 && $numberOfUnits < 5) {
                    $text = 'секунды';
                } else {
                    $text = 'секунд';
                }
            }
        }

        return $numberOfUnits . ' ' . $text . ' ' . Yii::t('app', 'назад');
    }
}

function wrap($fontSize, $fontFace, $string, $width)
{

    $ret = "";
    $arr = explode(" ", $string);

    foreach ($arr as $word) {
        $testboxWord = imagettfbbox($fontSize, 0, $fontFace, $word);

        // huge word larger than $width, we need to cut it internally until it fits the width
        $len = strlen($word);
        while ($testboxWord[2] > $width && $len > 0) {
            $word = substr($word, 0, $len);
            $len--;
            $testboxWord = imagettfbbox($fontSize, 0, $fontFace, $word);
        }

        $teststring = $ret . ' ' . $word;
        $testboxString = imagettfbbox($fontSize, 0, $fontFace, $teststring);
        if ($testboxString[2] > $width) {
            $ret .= ($ret == "" ? "" : "\n") . $word;
        } else {
            $ret .= ($ret == "" ? "" : ' ') . $word;
        }
    }

    return $ret;
}

function drawBorder(&$img, &$color, $thickness)
{
    $x = ImageSX($img);
    $y = ImageSY($img);
    for ($i = 0; $i < $thickness; $i++)
        ImageRectangle($img, $i, $i, $x--, $y--, $color);
}

function base64_to_jpeg($base64_string, $output_file)
{

    $ifp = fopen($output_file, "wb");
    fwrite($ifp, base64_decode($base64_string));
    fclose($ifp);
    return ($output_file);
}

/**
 * This is the shortcut to Yii::app()
 */
function app()
{
    return Yii::$app;
}

/**
 * This is the shortcut to Yii::app()->user.
 */
function user()
{
    return Yii::$app->getUser();
}

/**
 * This is the shortcut to Yii::app()->createUrl()
 */
function url($route, $params = array(), $ampersand = '&')
{
    return Yii::$app->getUrlManager()->createUrl($route, $params, $ampersand);
    // return Yii::app()->createUrl($route,$params,$ampersand);
}

/**
 * This is the shortcut to Yii::app()->createUrl()
 */
function urlServer($route, $params = array())
{
    $url = param('serverUrl') . '/' . $route . '?' . http_build_query($params);
    return $url;
}

/**
 * This is the shortcut to CHtml::encode
 */
function h($text)
{
    return htmlspecialchars($text, ENT_QUOTES, Yii::$app->charset);
}

/**
 * This is the shortcut to CHtml::link()
 */
function l($text, $url = '#', $htmlOptions = array())
{
    return Html::a($text, $url, $htmlOptions);
}

/**
 * This is the shortcut to Yii::t() with default category = 'stay'
 */
function t($message, $category = 'stay', $params = array(), $source = null, $language = null)
{
    return Yii::t($category, $message, $params, $source, $language);
}

function asDate($date)
{
    return Yii::$app->formatter->asDate($date);
}

function asPercent($value)
{
    return Yii::$app->formatter->asPercent($value);
}

function asDateTime($value)
{
    return Yii::$app->formatter->asDateTime($value);
}

function asTime($value)
{
    return Yii::$app->formatter->asTime($value);
}

function asDuration($value)
{
    return Yii::$app->formatter->asDuration($value);
}

/**
 * This is the shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function bu($url = null)
{
    static $baseUrl;
    if ($baseUrl === null)
        $baseUrl = Yii::$app->getRequest()->getBaseUrl();
    return $url === null ? $baseUrl : $baseUrl . '/' . ltrim($url, '/');
}

function n_format($number, $decimals = 2)
{
    if (empty($number))
        return 0;

    if (strpos($number, '.')) {
        $number = remove_last_zero($number);
    }

    if (strpos($number, '.')) {
        $verguldan_keyin = explode('.', $number);
        $num_length = strlen($verguldan_keyin[1]);
    } else {
        $num_length = 0;
    }

    if ($num_length > $decimals) {
        return number_format($number, $decimals, '.', ' ');
    } else {
        return number_format($number, $num_length, '.', ' ');
    }
}

function n_format1($number, $decimals = 2)
{

    if (strpos($number, '.')) {
        $number = remove_last_zero($number);
    }

    if (strpos($number, '.')) {
        $verguldan_keyin = explode('.', $number);
        $num_length = strlen($verguldan_keyin[1]);
    } else {
        $num_length = 0;
    }

    if ($num_length > $decimals) {
        return number_format($number, $decimals, '.', '');
    } else {
        return $number;
    }
}

function remove_last_zero($number)
{
    $length = strlen($number);

    $qush = false;
    $new_number = '';

    for ($i = $length; $i >= 0; $i--) {

        $last_sign = substr($number, $i, 1);

        if ($last_sign != 0) {
            $qush = true;
        }

        if ($qush) {
            $new_number = $last_sign . $new_number;
        }

        if (!$qush && $last_sign == '.') {

            $qush = true;
        }
    }

    return $new_number;
}

/**
 * This is the shortcut to Yii::app()->theme->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function thu($url = null)
{
    static $baseUrl;
    if ($baseUrl === null)
        $baseUrl = Yii::app()->getTheme()->getBaseUrl();
    return $url === null ? $baseUrl : $baseUrl . '/' . ltrim($url, '/');
}

/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::$app->params[$name].
 */
function param($name)
{
    return Yii::$app->params[$name];
}

//
// returns trace
function fb($what)
{
    echo Yii::trace(CVarDumper::dumpAsString($what), 'vardump');
}

/**
 * <pre>$var</pre>
 */
function pr($variable)
{
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
}

/**
 * <pre>$var</pre>;die();
 */
function prd($variable)
{
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
    die;
}

/**
 * cut text and put special string to last
 */
function cut_text($string, $len, $show = '...')
{

    $string = strip_tags($string);

    if (mb_strlen($string) > $len) {

        return mb_substr($string, 0, $len, 'utf8') . $show;
    } else {

        return $string;
    }
}

/**
 * returns correct russian date with month name
 * Assume $date is in d.m.Y format
 */
function russianDate($date)
{
    $date = explode(".", $date);
    switch ($date[1]) {
        case 1:
            $m = 'января';
            break;
        case 2:
            $m = 'февраля';
            break;
        case 3:
            $m = 'марта';
            break;
        case 4:
            $m = 'апреля';
            break;
        case 5:
            $m = 'мая';
            break;
        case 6:
            $m = 'июня';
            break;
        case 7:
            $m = 'июля';
            break;
        case 8:
            $m = 'августа';
            break;
        case 9:
            $m = 'сентября';
            break;
        case 10:
            $m = 'октября';
            break;
        case 11:
            $m = 'ноября';
            break;
        case 12:
            $m = 'декабря';
            break;
    }
    return $date[0] . '&nbsp;' . $m; //.'&nbsp;'.$date[2];
}

function russianMonth($month)
{
    switch ($month) {
        case 1:
            $m = 'январь';
            break;
        case 2:
            $m = 'февраль';
            break;
        case 3:
            $m = 'март';
            break;
        case 4:
            $m = 'апрель';
            break;
        case 5:
            $m = 'май';
            break;
        case 6:
            $m = 'июнь';
            break;
        case 7:
            $m = 'июль';
            break;
        case 8:
            $m = 'август';
            break;
        case 9:
            $m = 'сентябрь';
            break;
        case 10:
            $m = 'октябрь';
            break;
        case 11:
            $m = 'ноябрь';
            break;
        case 12:
            $m = 'декабрь';
            break;
    }
    return $m;
}

function mb_ucfirst($string)
{
    return mb_strtoupper(mb_substr($string, 0, 1)) . mb_strtolower(mb_substr($string, 1));
}

/**
 * PHP hide_email() is a PHP function to protect the E-mail address you publish on your website against bots or spiders that index or harvest E-mail addresses for sending you spam.
 * It uses a substitution cipher with a different key for every page load.
 * Read more at http://www.webappers.com/2010/02/02/protect-your-email-address-with-php-hide_email/#r0vokldmqAhxqrW6.99
 */
function hide_email($email)
{
    $character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';

    $key = str_shuffle($character_set);
    $cipher_text = '';
    $id = 'e' . rand(1, 999999999);

    for ($i = 0; $i < strlen($email); $i += 1)
        $cipher_text .= $key[strpos($character_set, $email[$i])];

    $script = 'var a="' . $key . '";var b=a.split("").sort().join("");var c="' . $cipher_text . '";var d="";';

    $script .= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';

    $script .= 'document.getElementById("' . $id . '").innerHTML="<a href=\\"mailto:"+d+"\\">"+d+"</a>"';

    $script = "eval(\"" . str_replace(array("\\", '"'), array("\\\\", '\"'), $script) . "\")";

    $script = '<script type="text/javascript">/*<![CDATA[*/' . $script . '/*]]>*/</script>';

    return '<span id="' . $id . '">[javascript protected email address]</span>' . $script;
}

/**
 * add http:// to the url if there isn't a http:// or https:// or ftp://
 */
function addhttp($url)
{
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

/**
 * show thumb for image
 * status 1 for crop else 0
 */
function thumb($full_image_path, $thumb_width, $thumb_height, $status = 0)
{
    // get thumb folder
    $thumbFolder = Yii::getPathOfAlias('webroot') . param('thumbFolder');

    $pathinfo = pathinfo($full_image_path);
    //$newFileName = $pathinfo['filename'].$thumb_width.'x'.$thumb_height.'.'.$pathinfo['extension'];
    $newFileName = $pathinfo['filename'] . $thumb_width . 'x' . $thumb_height . '.png';

    if (file_exists($thumbFolder . $newFileName)) {

        $image = imagecreatefrompng($thumbFolder . $newFileName);
    } else {

        $filename = $full_image_path;

        // resize it
        $obj = new MyImage();
        //set maximum width within wich the image should be resized
        $obj->max_width($thumb_width);
        // set maximum height within wich the image should be resized
        // for example size of the area in which image to be displayed
        $obj->max_height($thumb_height);
        $obj->image_path($filename);
        //call the function to resize the image
        if ($status == 0) {
            $image = $obj->get_image_resize();
        } else {
            $image = $obj->get_image_crop();
        }

        // save image to file
        imagepng($image, $thumbFolder . $newFileName);
    }

    header('Content-type: image/jpeg');

    print imagejpeg($image, null, 100);

    exit;
}

/**
 * keep file from overwriting, if file exist it renames file name until unique
 * it receives full path file name
 * returns renamed full path file name
 */
function fileOverwrite($full_file_path)
{
    $pathinfo = pathinfo($full_file_path);

    $uploadDirectory = $pathinfo['dirname'];

    $filename = $pathinfo['filename'];

    $ext = $pathinfo['extension'];

    while (file_exists($uploadDirectory . DIRECTORY_SEPARATOR . $filename . '.' . $ext)) {
        $filename .= rand(10, 999);
    }

    return $uploadDirectory . DIRECTORY_SEPARATOR . $filename . '.' . $ext;
}

/*
 * email send function
 *
 */

function send_mime_mail($name_from, // имя отправителя
                        $email_from, // email отправителя
                        $email_to, // email получателя
                        $subject, // тема письма
                        $body, // текст письма
                        $data_charset = 'UTF-8', // кодировка переданных данных
                        $send_charset = 'KOI8-R' // кодировка письма
)
{

    // if many email receivers
    if (is_array($email_to)) {
        $to = implode(", ", $email_to);
    } else {
        $to = $email_to;
    }

    $subject = mime_header_encode($subject, $data_charset, $send_charset);
    $from = mime_header_encode($name_from, $data_charset, $send_charset) . ' <' . $email_from . '>';
    if ($data_charset != $send_charset) {
        $body = iconv($data_charset, $send_charset, $body);
    }

    $headers = "Content-type: text/html; charset=\"" . $send_charset . "\"\n";
    $headers .= "From: $from\n";
    $headers .= "Mime-Version: 1.0\n";

    return mail($to, $subject, $body, $headers);
}

/*
 * helper for email send function
 */

function mime_header_encode($str, $data_charset, $send_charset)
{
    if ($data_charset != $send_charset) {
        $str = iconv($data_charset, $send_charset, $str);
    }
    return '=?' . $send_charset . '?B?' . base64_encode($str) . '?=';
}

function clearPHPMailer()
{
    Yii::app()->mailer->ClearAddresses();
    Yii::app()->mailer->ClearCCs();
    Yii::app()->mailer->ClearBCCs();
    Yii::app()->mailer->ClearReplyTos();
    Yii::app()->mailer->ClearAllRecipients();
    Yii::app()->mailer->ClearAttachments();
    Yii::app()->mailer->ClearCustomHeaders();
}

// embed images for phpmailer
function embed_images($body)
{
    // get all img tags
    preg_match_all('/<img.*?>/', $body, $matches);
    if (!isset($matches[0]))
        return;
    // foreach tag, create the cid and embed image
    $i = 1;
    foreach ($matches[0] as $img) {
        // make cid
        $id = 'img' . ($i++);
        // replace image web path with local path
        preg_match('/src="(.*?)"/', $img, $m);
        if (!isset($m[1]))
            continue;
        $arr = parse_url($m[1]);
        if (!isset($arr['host']) || !isset($arr['path']))
            continue;
        // add
        $imgPath = param('webroot') . $arr['path'];
        $fileName = pathinfo($imgPath, PATHINFO_FILENAME) . '.' . pathinfo($imgPath, PATHINFO_EXTENSION);
        Yii::app()->mailer->AddEmbeddedImage($imgPath, $id, $fileName);
        $body = str_replace($img, '<img alt="" src="cid:' . $id . '" style="border: none;" />', $body);
    }
    return $body;
}

function getSetting($name)
{
    $market = Yii::app()->session['market'];

    $criteria = new CDbCriteria;
    $criteria->condition = 'name="' . $name . '" and idMarket=' . $market->id;
    $settings = getDataApi('Setting', 'GET', $criteria);
    $setting = $settings[0];

    return $setting;
}

function getDataPk($model, $id)
{
    $criteria = new CDbCriteria;
    $criteria->condition = 'id=' . $id;
    $value = getDataApi($model, 'GET', $criteria);
    $result = array();
    if (!empty($value)) {
        $result = $value[0];
    }
    return $result;
}

/*
 *   function for getting result from API
 *   $model - model name
 *   $methos - sending method, [GET, POST, PUT, DELETE]
 *   $params - array() parameters to send
 */

function getDataApi($model, $method, $params = array(), $decoding = 'json')
{
    // api url
    $url = 'http://localhost/takeoneServer/index.php/api/' . $model;

    //open connection
    $ch = curl_init();
    // pr($params);
    // send header
    $header = array("X_ASCCPE_USERNAME: demo", "X_ASCCPE_PASSWORD: demo");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    switch ($method) {
        case 'GET':
            $url = $url . '?' . http_build_query($params);
            break;

        case 'POST':
            // Send request as POST
            curl_setopt($ch, CURLOPT_POST, count($params));

            // Array of data to POST in request
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            break;

        case 'PUT':

            // Send request as POST
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

            // Array of data to POST in request
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            break;

        case 'DELETE':
            # code...
            break;

        case 'FUNC':

            // Send request as POST
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'FUNC');

            // Array of data to POST in request
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

            break;

        default:
            # code...
            break;
    }

    // URL to send request to
    curl_setopt($ch, CURLOPT_URL, $url);


    // Return the response as a string instead of outputting it to the screen
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Number of seconds to spend attempting to connect
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);

    //execute post
    $result = curl_exec($ch);

    // if error show it
    if (!$result) {
        echo curl_error($ch);
    }

    //close connection
    curl_close($ch);

    if ($decoding == 'json') {
        return json_decode($result);
    }
}

/*
 *   function for getting result from ems post
 */

function getEmsApi($url)
{

    //open connection
    $ch = curl_init();

    // $url = $url.'?'.http_build_query($params);
    // URL to send request to
    curl_setopt($ch, CURLOPT_URL, $url);

    // Return the response as a string instead of outputting it to the screen
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Number of seconds to spend attempting to connect
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);

    //execute post
    $result = curl_exec($ch);

    // if error show it
    if (!$result) {
        echo curl_error($ch);
    }

    //close connection
    curl_close($ch);

    // return json_decode($result);
    return $result;
}

// download file from url
function file_download_http($url, $name)
{

    header("Content-Description: File Transfer");
    header("Content-Type: application/octet-stream");
    header('Content-Disposition: attachment; filename="' . $name . '"');

    readfile($url);
}

function big_file_download($file)
{

    if (!file_exists($file)) {

        echo $file;
        die('Bunday fayl yo`q');
    }

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}

// convert date like 18.01.1982 to unix timestamp
function convertDate($date, $dot = '.')
{
    $k = 0;
    $new_date[0] = '';  // day
    $new_date[1] = '';  // month
    $new_date[2] = '';  // year
    for ($i = 0; $i <= strlen($date); $i++) {
        $m = substr($date, $i, 1);
        if ($m == $dot) {
            $k++;
        } else {
            $new_date[$k] .= $m;
        }
    }
    $result = mktime(0, 0, 0, $new_date[1], $new_date[0], $new_date[2]);
    return $result;
}

function groupArray($array, $index)
{
    $result = [];

    foreach ($array as $value) {

        $result[$value[$index]][] = $value;
    }

    return $result;
}

function removeScriptTag($js)
{
    $js = str_replace(array("<script>", "</script>"), "", $js);
    return $js;
}

function getYiiName($str)
{
    $str = strtolower(/* preg_replace('~(?!\A)(?=[A-Z]+)~', '-', */ $str);
    $str = str_replace('[', '-', $str);
    $str = str_replace(']', '', $str);

    return $str;
}

function ruslat($textcyr = null, $textlat = null)
{
    $textcyr = str_replace("'", '`', $textcyr);
    $textlat = str_replace("'", '`', $textlat);

    $cyr = array(
        'ж', 'ч', 'щ', 'ш', 'ю', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ъ', 'ь', 'э', 'я', 'ў', 'қ', 'ғ', 'ҳ',
        'Ж', 'Ч', 'Щ', 'Ш', 'Ю', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ъ', 'Ь', 'Э', 'Я', 'Ў', 'Қ', 'Ғ', 'Ҳ');
    $lat = array(
        'j', 'ch', 'sht', 'sh', 'yu', 'a', 'b', 'v', 'g', 'd', 'e', 'yo', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'x', 'ts', '`', '`', 'e', 'ya', 'o`', 'q', 'g`', 'h',
        'J', 'Ch', 'Sht', 'Sh', 'Yu', 'A', 'B', 'V', 'G', 'D', 'E', 'Yo', 'Z', 'I', 'y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'X', 'Ts', '`', '`', 'E', 'Ya', 'O`', 'Q', 'G`', 'H');
    if ($textcyr)
        return str_replace($cyr, $lat, $textcyr);
    else if ($textlat)
        return str_replace($lat, $cyr, $textlat);
    else
        return null;
}

function num2str($num)
{
    $nul = 'ноль';
    $ten = array(
        array('', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
        array('', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
    );
    $a20 = array('десять', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать');
    $tens = array(2 => 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто');
    $hundred = array('', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот');
    $unit = array(// Units
        // array('копейка' ,'копейки' ,'копеек',  1),
        // array('рубль'   ,'рубля'   ,'рублей'    ,0),
        array('тийин', 'тийин', 'тийин', 1),
        array('сум', 'сум', 'сум', 0),
        array('тысяча', 'тысячи', 'тысяч', 1),
        array('миллион', 'миллиона', 'миллионов', 0),
        array('миллиард', 'милиарда', 'миллиардов', 0),
    );
    //
    list($rub, $kop) = explode('.', sprintf("%015.2f", floatval($num)));
    $out = array();
    if (intval($rub) > 0) {
        foreach (str_split($rub, 3) as $uk => $v) { // by 3 symbols
            if (!intval($v))
                continue;
            $uk = sizeof($unit) - $uk - 1; // unit key
            $gender = $unit[$uk][3];
            list($i1, $i2, $i3) = array_map('intval', str_split($v, 1));
            // mega-logic
            $out[] = $hundred[$i1]; # 1xx-9xx
            if ($i2 > 1)
                $out[] = $tens[$i2] . ' ' . $ten[$gender][$i3];# 20-99
            else
                $out[] = $i2 > 0 ? $a20[$i3] : $ten[$gender][$i3];# 10-19 | 1-9
            // units without rub & kop
            if ($uk > 1)
                $out[] = morph($v, $unit[$uk][0], $unit[$uk][1], $unit[$uk][2]);
        } //foreach
    } else
        $out[] = $nul;
    $out[] = morph(intval($rub), $unit[1][0], $unit[1][1], $unit[1][2]); // rub
    $out[] = $kop . ' ' . morph($kop, $unit[0][0], $unit[0][1], $unit[0][2]); // kop
    return trim(preg_replace('/ {2,}/', ' ', join(' ', $out)));
}

function num2str_en($number)
{

    $hyphen = '-';
    $conjunction = ' and ';
    $separator = ', ';
    $negative = 'negative ';
    $decimal = ' point ';
    $dictionary = array(
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen',
        20 => 'twenty',
        30 => 'thirty',
        40 => 'fourty',
        50 => 'fifty',
        60 => 'sixty',
        70 => 'seventy',
        80 => 'eighty',
        90 => 'ninety',
        100 => 'hundred',
        1000 => 'thousand',
        1000000 => 'million',
        1000000000 => 'billion',
        1000000000000 => 'trillion',
        1000000000000000 => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . num2str_en(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens = ((int)($number / 10)) * 10;
            $units = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . num2str_en($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int)($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = num2str_en($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= num2str_en($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string)$fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

function morph($n, $f1, $f2, $f5)
{
    $n = abs(intval($n)) % 100;
    if ($n > 10 && $n < 20)
        return $f5;
    $n = $n % 10;
    if ($n > 1 && $n < 5)
        return $f2;
    if ($n == 1)
        return $f1;
    return $f5;
}

function randomDate($start_date, $end_date)
{
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('Y-m-d', $val);
}

function randomDateTime($start_date, $end_date)
{
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('Y-m-d H:i:s', $val);
}

# Число прописью

function num_propis($num)
{ // $num - цело число
    # Все варианты написания чисел прописью от 0 до 999 скомпануем в один небольшой массив
    $m = array(
        array('ноль'),
        array('-', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
        array('десять', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать'),
        array('-', '-', 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто'),
        array('-', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот'),
        array('-', 'одна', 'две')
    );

    # Все варианты написания разрядов прописью скомпануем в один небольшой массив
    $r = array(
        array('...ллион', '', 'а', 'ов'), // используется для всех неизвестно больших разрядов
        array('тысяч', 'а', 'и', ''),
        array('миллион', '', 'а', 'ов'),
        array('миллиард', '', 'а', 'ов'),
        array('триллион', '', 'а', 'ов'),
        array('квадриллион', '', 'а', 'ов'),
        array('квинтиллион', '', 'а', 'ов')
        // ,array(... список можно продолжить
    );

    if ($num == 0)
        return $m[0][0];# Если число ноль, сразу сообщить об этом и выйти
    $o = array(); # Сюда записываем все получаемые результаты преобразования
    # Разложим исходное число на несколько трехзначных чисел и каждое полученное такое число обработаем отдельно
    foreach (array_reverse(str_split(str_pad($num, ceil(strlen($num) / 3) * 3, '0', STR_PAD_LEFT), 3)) as $k => $p) {
        $o[$k] = array();

        # Алгоритм, преобразующий трехзначное число в строку прописью
        foreach ($n = str_split($p) as $kk => $pp)
            if (!$pp)
                continue;
            else
                switch ($kk) {
                    case 0:
                        $o[$k][] = $m[4][$pp];
                        break;
                    case 1:
                        if ($pp == 1) {
                            $o[$k][] = $m[2][$n[2]];
                            break 2;
                        } else$o[$k][] = $m[3][$pp];
                        break;
                    case 2:
                        if (($k == 1) && ($pp <= 2))
                            $o[$k][] = $m[5][$pp];

                        else$o[$k][] = $m[1][$pp];
                        break;
                }
        $p *= 1;
        if (!$r[$k])
            $r[$k] = reset($r);

        # Алгоритм, добавляющий разряд, учитывающий окончание руского языка
        if ($p && $k)
            switch (true) {
                case preg_match("/^[1]$|^\\d*[0,2-9][1]$/", $p):
                    $o[$k][] = $r[$k][0] . $r[$k][1];
                    break;
                case preg_match("/^[2-4]$|\\d*[0,2-9][2-4]$/", $p):
                    $o[$k][] = $r[$k][0] . $r[$k][2];
                    break;
                default:
                    $o[$k][] = $r[$k][0] . $r[$k][3];
                    break;
            }
        $o[$k] = implode(' ', $o[$k]);
    }

    return implode(' ', array_reverse($o));
}

/*
 * @author Muhammad
 */
function round_decimal($decimal)
{
    return ((int)$decimal == $decimal ? round($decimal) : rtrim($decimal, "0"));
}

function convert_date($date, $fromFormat = 'd.m.Y', $toFormat = 'Y-m-d')
{
//    $arrExpression = [
//        'd' => '(\d{1,2})',
//        'm' => '(\d{1,2})',
//        'Y' => '(\d{1,4})',
//    ];
    return preg_replace('/(\d{1,2})\.(\d{1,2})\.(\d{1,4})/', '$3-$2-$1', $date);
}

function number2roman($num, $isUpper = true)
{
    $n = intval($num);
    $res = '';

    /*** roman_numerals array ***/
    $roman_numerals = array(
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    );

    foreach ($roman_numerals as $roman => $number) {
        /*** divide to get matches ***/
        $matches = intval($n / $number);

        /*** assign the roman char * $matches ***/
        $res .= str_repeat($roman, $matches);

        /*** substract from the number ***/
        $n = $n % $number;
    }

    /*** return the res ***/
    if ($isUpper) return $res;
    else return strtolower($res);
}

function getDsnAttribute($name, $dsn)
{
    if (preg_match('/' . $name . '=([^;]*)/', $dsn, $match)) {
        return $match[1];
    } else {
        return null;
    }
}

function isRoleAllowed(array $roles)
{
    return in_array(Yii::$app->user->identity->role_id, $roles);
}
