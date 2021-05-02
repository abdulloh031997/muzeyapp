<?php
define('DS', DIRECTORY_SEPARATOR);
require dirname(__FILE__) . DS . 'core' . DS . 'Prayer_Times.php';
$settings               = new Settings('US');
// $settings->location     = array('Detroit', 'Michigan', 'US');
$settings->latitude     = 41.3171;
$settings->longitude    = 69.2494;
$settings->timezone     = 'Asia/Tashkent';
$settings->method = 4; // See below for complete list of methods
$settings->juristic = 1; // (0 - Shafi/Hanbli/Maliki, 1 - Hanafi)
$prayer = new Prayer_Times($settings);
$times = $prayer->getPrayerTimes(time());
echo '<span class="px-1 text-light">Fajir-'  . date($times[0]).'</span>';
echo '<span class="px-1 text-light">Duha-'       . date($times[1]).'</span>';
echo '<span class="px-1 text-light">Dhur-'       . date($times[2]).'</span>';
echo '<span class="px-1 text-light">Asr-'        . date($times[3]).'</span>';
echo '<span class="px-1 text-light">Maghrib-'    . date($times[4]).'</span>';
echo '<span class="px-1 text-light">Isha-'       . date($times[5]).'</span>';