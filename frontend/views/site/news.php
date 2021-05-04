<?php

use yii\helpers\Url;

$url = Yii::getAlias("@fronted_domain");
?>
<section>
    <div class="p-5 bg-dark"></div>
    <div class="p-3 bg-dark">
      <h5 class="text-white text-center p-4"><a href="" class="text-warning"><b>Бош саҳифа</b></a> | Янгиликлар</h5>
    </div>
  </section>
  <main id="main">

     
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">
        <div class="section-title">
          <h2>Янгиликлар</h2>
        </div>
        <div class="row">
        <?php foreach ($news as $index => $one):?>
          <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <article class="entry">

              <div class="entry-img">
                <img src="<?=$url.'/'.$one['image']?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="<?=Url::to(['site/inner','id'=>$one['id']], $schema = true)?>" ><?=$one['title']?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-start"><i class="icofont-ui-calendar"></i> <a href="<?=Url::to(['site/inner','id'=>$one['id']], $schema = true)?>"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                </ul>
              </div>
              <div class="entry-content">
                <div class="read-more">
                  <a href="<?=Url::to(['site/inner','id'=>$one['id']], $schema = true)?>"><i class="icofont-arrow-right"></i></a>
                </div>
              </div>
            </article><!-- End blog entry -->
          </div>
            <?php endforeach  ?>
        </div>
     
        <div class="blog-pagination" data-aos="fade-up">
            <?php  echo  \yii\widgets\LinkPager::widget([
                'pagination' => $pagination,
            ]);?>
        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->