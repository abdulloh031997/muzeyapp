<?php
    use yii\helpers\Url;
?>
<section>
  <div class="p-5 bg-dark"></div>
  <div class="p-5 bg-dark">
    <h5 class="text-white text-center pt-2"><a href="" class="text-warning"><b>Бош саҳифа</b></a> | Коллекции</h5>
  </div>
</section>

  <main id="main">
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">
            <?= \frontend\widgets\LeftWidget::widget() ?>

            <div class="col-lg-9">
                <section id="portfolio" class="portfoio" style="padding:0 !important">
                <div class="container" data-aos="fade-up">
                    <div class="row portfolio-container">
                        <?php foreach ($collection as $key => $one) { ?>
                            <div class="col-md-6 portfolio-item one<?=$one['id']?>">
                                <img src="<?=$url.'/'.$one['image']?>" class="img-fluid" style="width:100%; height:250px; object-fit: cover;"" alt="">
                                <div class="portfolio-info">
                                <h4><?=$one['name']?></h4>
                                <a href="<?=$url.'/'.$one['image']?>" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class='bx bx-zoom-in'></i></a>
                                <a href="<?=Url::to(['site/collection','id'=>$one['id']], $schema = true)?>" class="details-link" title="More Details"><i class="bx bx-show"></i></a>
                                </div>
                            </div>
                        <?php }  ?>
                    </div>
                    </div><!-- End blog entries list -->
                </section>
            </div>
        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->