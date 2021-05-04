 <?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\helpers\Helper;
    use common\models\Menu;
    $url = Yii::getAlias("@fronted_domain");
    function getRun($id){
        $out = '';
		$name = Menu::find()->where(['status'=>1])->andWhere(['id'=>$id])->asArray()->andWhere(['language'=>current_lang()])->one();
		
        $exist = Menu::find()->where(['status'=>1])->asArray()->andWhere(['parent_id'=>$id])->andWhere(['language'=>current_lang()]);

		
        if($exist->exists()){
          $out.='<li><a>'.$name['name'].'</a>';
          $out.='<ul class="dropdown-nav">';
			$items = $exist->orderBy(['c_order'=>SORT_ASC])->all();
            foreach ($items as $item) {
              $out.=getRun($item['id']);
            }
        	$out.='</ul></li>';
        }else{
          $out.='<li> <a href="'.Url::to([""]).'">'.$name['name'].'</a></li>';
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
          <li><i class="icofont-phone"></i> (+998)71 256-40-42</li>
          <li><i class="icofont-clock-time icofont-flip-horizontal"></i> Ҳар куни 9.00-18.00</li>
        </ul>
      </div>
      <div class="cta">
        <a href="#about" class="scrollto">Купить билет</a>
        <a href="https://roundme.com/tour/568815/view/1845032" target="_blank" class="bg-dark">Вертуал</a>
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
          <!-- <li class="active"><a href="#header">Бош саҳифа</a></li>
          <li><a href="#about">Биз ҳақимизда</a></li>
          <li><a href="#services">Коллекциялар</a></li>
          <li><a href="#portfolio">Кўргазма</a></li>
          <li><a href="#team">Онлайн буюртма </a></li>
          <li><a href="blog.html">Янгиликлар</a></li>
          <li><a href="#contact">Боғланиш</a></li>
          <li class="drop-down"><a href="" class="border">O'zb</a>
            <ul>
              <li><a href="#" class="border">O'zb 1</a></li>
              <li><a href="#">O'zb 3</a></li>
            </ul>
          </li> -->
          <?php
                $model = Menu::find()->where(['status'=>1])->andWhere(['parent_id'=>0])->andWhere(['language'=>current_lang()])->orderBy(['c_order'=>SORT_ASC])->asArray()->all();
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
          