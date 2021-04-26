<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="https://api-maps.yandex.ru/2.1/?apikey=b933c40e-e467-4279-a03d-25860db4805c&lang=ru_RU" type="text/javascript">
</script>
<script type="text/javascript">
    ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
                center: [41.339099, 69.288834],
                zoom: 18
            }, {
                searchControlProvider: 'yandex#search'
            }),
            MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            ),

            myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                hintContent: '',
                balloonContent: 'Ilmiy-o\'quv amaliy markaz'
            }, {
                iconLayout: 'default#image',
                iconImageHref: '/images/placeholder.svg',
                iconImageSize: [39, 39],

            }),

            myPlacemarkWithContent = new ymaps.Placemark([41.339099, 69.288834], {

            }, {

            });

        myMap.geoObjects
            .add(myPlacemark);
    });
</script>

<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-white" style="margin-top: 89px">Biz bilan bog‘lanish</h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<div class="container"  style="margin-bottom: 150px; margin-top: 50px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3">
               <div class="row">
                   <div class="col-md-6">
                       <div class="row">
                           <div class="col-md-6">
                                <div class="card p-1">
                                    <p style="margin: 0 auto;font-size:larger;font-weight:bold; font-family: Sans-serif">
                                        <span><img src="/images/placeholder.svg" alt="" style="width: 35px"></span>
                                    <div style="text-align: center"> Manzil</div>
                                    <div style="text-align: center">
                                        100084, Toshkent shahri, Bog‘ishamol ko‘chasi, 12-uy
                                    </div>
                                </div>
                           </div>
                           <div class="col-md-6">
                               <div class="card p-1">
                                   <p style="margin: 0 auto;font-size:larger;font-weight:bold;font-family: Sans-serif">
                                       <span> <img src="/images/telephone.svg" style="width: 35px" alt=""></span>
                                       <div style="text-align: center">
                                        Telefon raqam
                                        </div>
                                   <div style="text-align: center">
                                       (+998 95) 515-68-68
                                   </div>
                                   </p>
                               </div>
                           </div>
                           <div class="col-md-6 mt-3">
                               <a href="https://t.me/dtmilmiymarkaz" target="_blank">
                                   <div class="card p-1 text-center">
                                       <span> <img src="/images/telegram.svg" style="width: 35px" alt=""></span>
                                       <div>
                                           Telegram
                                       </div>
                                       <div class="link">
                                           <a href="https://t.me/dtmilmiymarkaz" style="text-decoration: none" target="_blank">dtmilmiymarkaz</a>
                                       </div>
                                   </div>
                               </a>
                           </div>
                           <div class="col-md-6 mt-3">
                               <a href="https://corp.uz/webmail/" target="_blank">
                                   <div class="card p-1 text-center">

                                       <span> <img src="/images/email.svg" style="width: 35px" alt=""></span>
                                       <div>
                                           Elektron pochta
                                       </div>
                                       <div class="link">
                                           <a href="https://corp.uz/webmail/" target="_blank" style="text-decoration: none">ilmiy_markaz@dtm.uz</a>
                                       </div>
                                   </div>
                               </a>
                           </div>
                       </div>
                       <div class="col-md-12 mt-5">
                           <div class="p-1">
                               <div class="text-center">
                                   <p style="margin: 0 auto;font-size:larger;font-weight:bold;font-family: Sans-serif"><span> <img src="/images/clock.svg" style="width: 25px" alt=""></span>&nbsp;&nbsp; Dushanba - Juma 09.00 - 18.00</p> <br>
                                   <p>
                                       <a href="#" class="btn btn-default" style="text-decoration: none;font-weight: bold; background-color: #0a73bb; color: #fff;">Du</a>
                                       <a href="#" class="btn btn-default" style="text-decoration: none;font-weight: bold; background-color: #0a73bb; color: #fff;">Se</a>
                                       <a href="#" class="btn btn-default" style="text-decoration: none;font-weight: bold; background-color: #0a73bb; color: #fff;">Cho</a>
                                       <a href="#" class="btn btn-default" style="text-decoration: none;font-weight: bold; background-color: #0a73bb; color: #fff;">Pa</a>
                                       <a href="#" class="btn btn-default" style="text-decoration: none;font-weight: bold; background-color: #0a73bb; color: #fff;">Ju</a>
                                       <a href="#" class="btn btn-default border" style="text-decoration: none;font-weight: bold;">Sha</a>
                                       <a href="#" class="btn btn-default border" style="text-decoration: none;font-weight: bold;">Ya</a>
                                   </p>
                                   <p style="margin: 0 auto;font-size:larger;font-weight:bold; font-family: Sans-serif"><span><img src="/images/dinner.svg" style="width: 25px" alt=""></span>&nbsp;&nbsp;</span>&nbsp; Tushlik vaqti 13.00 - 14.00</p> <br>
                               </div>
                           </div>
                       </div>



                   </div>
                   <div class="col-md-6">
                       <div id="map" style="width: 100%; height: 100%;"></div>

                   </div>
               </div>
            </div>
        </div>
    </div>
</div>
