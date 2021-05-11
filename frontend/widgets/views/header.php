 <?php

use common\models\Language;
use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\helpers\Helper;
    use common\models\Menu;
    $url = Yii::getAlias("@fronted_domain");
    $language = Language::find()->where(['status' =>1])->asArray()->all();
    // echo "<pre>";
    // print_r($language);
    // exit();
    // echo "</pre>";
    function getRun($id){
        $out = '';
        $name = Menu::find()->where(['status'=>1])->andWhere(['id'=>$id])->one();

        $exist = Menu::find()->where(['status'=>1])->andWhere(['parent_id'=>$id]);


        if($exist->exists()){
          $out.='<li class="dropdown">
                    <a href="'.Url::to(["$name->link"]).'" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">
                    '.$name->name.'
                    <span class="caret"></span></a>';
          $out.='<ul class="dropdown-menu">';
            $items = $exist->orderBy(['c_order'=>SORT_ASC])->all();

            foreach ($items as $item)
            {
              $out.=getRun($item->id);
            }
        $out.='</ul>
                </li>';
        }else{
          $out.='<li> <a class="" href="'.Url::to(["$name->link"]).'">'.$name->name.'</a></li>';
        }
        return $out;
      }
?>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top bg-dark  ">
    <div class="container d-flex align-items-center">
      <div class="contact-info mr-auto">
        <ul>
          <li><i class="icofont-envelope"></i><a href="mailto:info@muzeyart.uz">info@muzeyart.uz</a></li>
          <li><i class="icofont-phone"></i> <a href="tel:+998712564042">(+998)71 256-40-42</a>  </li>
          <li><i class="icofont-clock-time icofont-flip-horizontal"></i> Ҳар куни 9.00-18.00</li>
        </ul>
      </div>
      <div class="cta">
        <a href="<?=Url::to(['registred/create'])?>"  class="scrollto">Купить билет</a>
        <a href="https://roundme.com/tour/568815/view/1845032" target="_blank" class="bg-dark">Вертуал</a>
      </div>||
      <div id="languageModal" class="rdModal rdSmall">
        <?php foreach ($language as $index => $lang) :?>
          <a href="<?= \yii\helpers\Url::to(['site/change', 'lang' =>$lang['lang_code']]) ?>">
            <span class="ml-2 text-white"><?=$lang['name']?></span>
          </a>
          <?php endforeach; ?>
      </div>
    </div>
  </div>
 

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo mr-auto">
        <a href="#header" class="scrollto">Anyar</a>
      </h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="/" class="logo mr-auto scrollto"><img src="/assets/img/111.png" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <?php
                $model = Menu::find()->where(['parent_id'=>0])->andWhere(['language'=>current_lang()])->orderBy(['id'=>SORT_ASC])->asArray()->all();
                foreach($model as $one){
                    echo getRun($one['id']);
                }
            ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
<?php
$script = <<< JS
    // alert("okey");
JS;
$this->registerJs($script);
?>
          