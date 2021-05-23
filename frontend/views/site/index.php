  <?php
    
  
  ?>
    <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

      <!-- Slide 1 -->
      <?php $i=0; foreach ($slider as $index => $one): $i++; ?>
      <div class="carousel-item <?=($i==1)?'active':'' ?>">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown"><?=$one['title']?></h2>
          <p class="animate__animated animate__fadeInUp"> <?=$one['body']?></p>
          <a href="<?=\yii\helpers\Url::to(['site/about'])?>" class="btn-get-started animate__animated animate__fadeInUp scrollto">Batafsil</a>
        </div>
      </div>
      <?php endforeach; ?>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->
  <!-- <div class="container-fluid mt-0" >
    <div class="row">
      <div class="col-md-12">
        <div class="owl-carousel owl-theme" id="banner_car">
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/slides/10.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/slides/10.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/slides/10.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
          <div class="item border text-center text-warning">
              <img src="./assets/img/ayvan.jpg" width="100%" height="170px" style="object-fit: cover;" alt="">
          </div>
      </div>
      </div>
    </div>
  </div>  -->
<main id="main"><!-- ======= Icon Boxes Section ======= -->
  <section id="icon-boxes" class="icon-boxes">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12 d-flex align-items-stretch mt-5 mb-lg-0" data-aos="fade-up">
            <div class="icon-box">
              <div class="row">
                <div class="col-md-12">
                  <div class="section-title w-100">
                    <h2><?=(isset($about_key))?$about_key['title']:''?></h2>
                    <p>
                    <?=(isset($about_key))?$about_key['value']:''?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Icon Boxes Section -->

    <!-- ======= About Us Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?=(isset($news_key))?$news_key['title']:''?></h2>
        </div>

        <div class="row content">

        <?php

use yii\helpers\Url;

foreach ($post as $key => $one):?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
            <article class="entry">

              <div class="entry-img">
                <img src="<?=$url.'/'.$one['image']?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="<?=Url::to(['site/inner','id'=>$one['id']])?>" ><?=$one['title']?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-start"><i class="icofont-ui-calendar"></i> <a href="<?=Url::to(['site/inner','id'=>$one['id']])?>"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                </ul>
              </div>
              <div class="entry-content">
                <div class="read-more">
                  <a href="<?=Url::to(['site/inner','id'=>$one['id']])?>"><i class="icofont-arrow-right"></i></a>
                </div>
              </div>

            </article><!-- End blog entry -->
          </div>
          <?php endforeach; ?>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href="<?=Url::to(['site/news'])?>" class="float-right text-dark" style="font-weight: bold;">
              Барча сўнгги янгиликлар    
            </a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">
        <div class="section-title">
          <h2 class="text-center py-2"><?=(isset($part_key))?$part_key['title']:''?></h2>
        </div>
        <div class="owl-carousel clients-carousel">
            <?php foreach ($partner as $key => $one):?>
                <img src="<?=$url.'/'.$one['image']?>" alt="">
            <?php endforeach; ?>
        </div>

      </div>
    </section><!-- End Clients Section -->



    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?=(isset($kor_key))?$kor_key['title']:''?></h2>
          <p><?=(isset($kor_key))?$kor_key['value']:''?></p>
        </div>
        <div class="owl-carousel kor-carousel">
            <?php foreach ($impressions as $key => $one): $date=['1' => 'января','2' => 'февраля','3' => 'марта','4' => 'апреля','5' => 'мая','6' => 'июня','7' => 'июля','8' => 'августа','9' => 'сентября','10' => 'октября','11' => 'ноября','12' => 'декабря',];?>
                <div class="border" style="height:410px">
                <div class="position-relative w-100" style="height: 250px;background-image: url('<?=$url.'/'.$one['image']?>'); background-size: cover; background-position: center;">
                    <div class="position-absolute bg-dark" style="opacity: .3; top: 0; left:0; right: 0; bottom: 0;"></div>
                    <div class="position-absolute text-white d-flex flex-column justify-content-center align-items-center rounded-circle" style="top:10px; right:10px; width: 70px; height: 70px; background-color: rgb(5, 87, 158);">
                    <small><?PHP Yii::$app->formatter->locale = 'en-US'; echo Yii::$app->formatter->asDate($one['date'],'d')?></small>
                    </div>
                    <a href="#" class="position-absolute px-3 py-2 text-white" style="bottom:10px; left: 10px; background-color: rgb(5, 87, 158);">
                      <small>
                        <?php 
                            $month = Yii::$app->formatter->asDate($one['date'],'M');
                             if ($month == '1'){
                               echo $date['1'];
                             }
                             elseif ($month == '2'){
                              echo $date['2'];
                             }
                             elseif ($month == '3'){
                              echo $date['3'];
                             }
                             elseif ($month == '4'){
                              echo $date['4'];
                             }
                             elseif ($month == '5'){
                              echo $date['5']; 
                             }
                             elseif ($month == '6'){
                              echo $date['6'];
                             }
                             elseif ($month == '7'){
                              echo $date['7'];
                             }
                             elseif ($month == '8'){
                              echo $date['8'];
                             }
                             elseif ($month == '9'){
                              echo $date['9'];
                             }
                             elseif ($month == '10'){
                              echo $date['10'];
                             }
                             elseif ($month == '11'){
                              echo $date['11'];
                             }
                             elseif ($month == '12'){
                              echo $date['12'];
                             }
                        ?>
                      </small>
                    </a>
                </div>
                <div class="px-3 pt-4 pb-1">
                    <h3 class="entry-title">
                    <a href="blog-single.html" style="font-family: sans-serif; color: #444444; font-size:24px;"><?=$one['title']?></a>
                    </h3>
                </div>
                <div class="d-flex align-items-center mr-4 p-3">
                    <svg height="16px" class="mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 300.988 300.988" style="enable-background:new 0 0 300.988 300.988;" xml:space="preserve">
                    <g>
                    <g>
                        <path d="M150.494,0.001C67.511,0.001,0,67.512,0,150.495s67.511,150.493,150.494,150.493s150.494-67.511,150.494-150.493
                        S233.476,0.001,150.494,0.001z M150.494,285.987C75.782,285.987,15,225.206,15,150.495S75.782,15.001,150.494,15.001
                        s135.494,60.782,135.494,135.493S225.205,285.987,150.494,285.987z"/>
                        <polygon points="142.994,142.995 83.148,142.995 83.148,157.995 157.994,157.995 157.994,43.883 142.994,43.883 		"/>
                    </g>
                    </svg>
                    <small class="mt-1" style="color: rgb(5, 87, 158);"><?=$one['date']?></small>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
       

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="row" data-aos="zoom-in">
          <div class="col-lg-9 text-center text-lg-left">
          <h3><?=(isset($vertual_key))?$vertual_key['title']:''?></h3>
          <p><?=(isset($vertual_key))?$vertual_key['value']:''?></p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">VERTUAL</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfoio Section ======= -->
    <section id="portfolio" class="portfoio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
        <h3><?=(isset($kor_key))?$kor_key['title']:''?></h3>
          <p><?=(isset($kor_key))?$kor_key['value']:''?></p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <?php  foreach ($collection_category as $key => $one):?>
                  <li data-filter=".one<?=$one['id']?>"><?=$one['name']?></li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
          <?php foreach ($collection as $key => $one) { ?>
          <div class="col-lg-4 col-md-6 shadow portfolio-item one<?=$one['id']?>">
            <img src="<?=$url.'/'.$one['image']?>" class="img-fluid" style="width: 100%;height:450px" alt="">
            <div class="portfolio-info">
              <h4><?=$one['name']?></h4>
              <a href="<?=$url.'/'.$one['image']?>" data-gall="portfolioGallery" class="venobox preview-link" title=""><i class='bx bx-zoom-in'></i></a>
              <a href="<?=Url::to(['site/collection','id'=>$one['id']], $schema = true)?>" class="details-link" title="More Details"><i class="bx bx-show"></i></a>
            </div>
          </div>
          <?php }  ?>
        </div>

      </div>
    </section><!-- End Portfoio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
        <h3><?=(isset($team_key))?$team_key['title']:''?></h3>
          <p><?=(isset($team_key))?$team_key['value']:''?></p>
        </div>
        <div class="row">
          <?php foreach ($team as $key => $one) {?>
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="<?=$url.'/'.$one['image']?>" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4><?=$one['fio']?></h4>
                  <span><?=$one['position']?></span>
                  <p><?=$one['about']?></p>
                  <div class="social">
                   <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <?} ?>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?=(isset($contact_key))?$contact_key['title']:''?></h2>
        </div>

        <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

          <div class="col-lg-5">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4><?=(isset($address_key))?$address_key['title']:''?></h4>
                <p><?=(isset($address_key))?$address_key['value']:''?></p>
              </div>
              
              <div class="email">
                <i class="icofont-envelope"></i>
                <h4><?=(isset($email_key))?$email_key['title']:''?></h4>
                <p><?=(isset($email_key))?$email_key['value']:''?></p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4><?=(isset($phone_key))?$phone_key['title']:''?></h4>
                <p><?=(isset($phone_key))?$phone_key['value']:''?></p>
              </div>

            </div>

          </div>

          <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

            <!-- <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Ism" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Pochta" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Murojat" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Xabar"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Отправить</button></div>
            </form> -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2997.3504307145363!2d69.25686191499922!3d41.30123960929483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8ae1a21ab3e3%3A0xb3c15a54c88bcfd0!2z0JzRg9C30LXQuSDQn9GA0LjQutC70LDQtNC90L7Qs9C-INCY0YHQutGD0YHRgdGC0LLQsA!5e0!3m2!1sru!2s!4v1518956592862" width="100%" height="250px" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            
            
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    </main>