  <!-- ======= Icon Boxes Section ======= -->
  <section id="icon-boxes" class="icon-boxes">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12 d-flex align-items-stretch mt-5 mb-lg-0" data-aos="fade-up">
            <div class="icon-box">
              <div class="row">
                <div class="col-md-12">
                  <div class="section-title">
                    <h2>Биз ҳақимизда</h2>
                    <p>История музея начинается с 1927 г., когда в Ташкенте была организована «Выставка лучших произведений народных мастеров Узбекистана». Впоследствии она стала постоянной, получив название «Выставка народного хозяйства Узбекистана». На этой основе 7 июля
1937 г. открыли «Музей кустарных ремесел». Его первым директором был художник В.Развадовский. В разное время он пополнял фонды музеев восточных культур, этнографии, Оружейной палаты и других музеев Москвы и Санкт-Петербурга.</p>
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
          <h2>Янгиликлар</h2>
        </div>

        <div class="row content">

        <?php foreach ($post as $key => $one):?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
            <article class="entry">

              <div class="entry-img">
                <img src="<?=$url.'/'.$one['image']?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html" ><?=$one['title']?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-start"><i class="icofont-ui-calendar"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                </ul>
              </div>
              <div class="entry-content">
                <div class="read-more">
                  <a href="blog-single.html"><i class="icofont-arrow-right"></i></a>
                </div>
              </div>

            </article><!-- End blog entry -->
          </div>
          <?php endforeach; ?>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href="" class="float-right text-dark" style="font-weight: bold;">
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
          <h2 class="text-center py-2">ҲАМКОРЛАР</h2>
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
          <h2>Кўргазмалар</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        <div class="owl-carousel kor-carousel">
            <?php foreach ($impressions as $key => $one):?>
                <div class="border">
                <div class="position-relative w-100" style="height: 250px;background-image: url('<?=$url.'/'.$one['image']?>'); background-size: cover; background-position: center;">
                    <div class="position-absolute bg-dark" style="opacity: .3; top: 0; left:0; right: 0; bottom: 0;"></div>
                    <div class="position-absolute text-white d-flex flex-column justify-content-center align-items-center rounded-circle" style="top:10px; right:10px; width: 70px; height: 70px; background-color: rgb(5, 87, 158);">
                    <small>27</small>
                    <small><b>MAR</b></small>
                    </div>
                    <a href="#" class="position-absolute px-3 py-2 text-white" style="bottom:10px; left: 10px; background-color: rgb(5, 87, 158);"><small>PHOTOS</small></a>
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
                    <small class="mt-1" style="color: rgb(5, 87, 158);">6 min ago</small>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- <div class="row">
          <div class="col-md-6 p-4">
            <div class="border">
              <div class="position-relative w-100" style="height: 250px;background-image: url('./assets/images/slides/15.jpg'); background-size: cover; background-position: center;">
                <div class="position-absolute bg-dark" style="opacity: .3; top: 0; left:0; right: 0; bottom: 0;"></div>
                <div class="position-absolute text-white d-flex flex-column justify-content-center align-items-center rounded-circle" style="top:10px; right:10px; width: 70px; height: 70px; background-color: rgb(5, 87, 158);">
                  <small>27</small>
                  <small><b>MAR</b></small>
                </div>
                <a href="#" class="position-absolute px-3 py-2 text-white" style="bottom:10px; left: 10px; background-color: rgb(5, 87, 158);"><small>PHOTOS</small></a>
              </div>
              <div class="px-3 pt-4 pb-1">
                <h3 class="entry-title">
                  <a href="blog-single.html" style="font-family: sans-serif; color: #444444; font-size:24px;">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</a>
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
                <small class="mt-1" style="color: rgb(5, 87, 158);">6 min ago</small>
              </div>
            </div>
          </div>
          <div class="col-md-6 p-4">
            <div class="border">
              <div class="position-relative w-100" style="height: 250px;background-image: url('./assets/images/slides/15.jpg'); background-size: cover; background-position: center;">
                <div class="position-absolute bg-dark" style="opacity: .3; top: 0; left:0; right: 0; bottom: 0;"></div>
                <div class="position-absolute text-white d-flex flex-column justify-content-center align-items-center rounded-circle" style="top:10px; right:10px; width: 70px; height: 70px; background-color: rgb(5, 87, 158);">
                  <small>27</small>
                  <small><b>MAR</b></small>
                </div>
                <a href="#" class="position-absolute px-3 py-2 text-white" style="bottom:10px; left: 10px; background-color: rgb(5, 87, 158);"><small>PHOTOS</small></a>
              </div>
              <div class="px-3 pt-4 pb-1">
                <h3 class="entry-title">
                  <a href="blog-single.html" style="font-family: sans-serif; color: #444444; font-size:24px;">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</a>
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
                <small class="mt-1" style="color: rgb(5, 87, 158);">6 min ago</small>
              </div>
            </div>
          </div>
     
        </div> -->

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="row" data-aos="zoom-in">
          <div class="col-lg-9 text-center text-lg-left">
            <h3>Ўзбекистон амалий санъат ва ҳунармандчилик тарихи музейи.</h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, cumque possimus vel nobis in id ipsa nesciunt eligendi doloribus reiciendis eveniet quisquam laudantium necessitatibus illum aliquam nihil? Provident, qui laborum.</p>
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
          <h2>Коллекциялар</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos quasi sunt, omnis nihil aliquid neque vel, enim autem minima hic adipisci. Reprehenderit modi consectetur enim. Perferendis harum dignissimos distinctio quam.</p>
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
          <div class="col-lg-4 col-md-6 portfolio-item one<?=$one['id']?>">
            <img src="<?=$url.'/'.$one['image']?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?=$one['name']?></h4>
              <a href="<?=$url.'/'.$one['image']?>" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class='bx bx-zoom-in'></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-show"></i></a>
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
          <h2>КОМАНДА</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni harum cum ut ipsa facilis dolorum necessitatibus praesentium ea molestiae sit. Dolorum explicabo sit quam distinctio eveniet, quae doloribus quia nisi.</p>
        </div>

        <div class="row">
          <?php foreach ($team as $key => $one) {?>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="<?=$url.'/'.$one['image']?>" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4><?=$one['fio']?></h4>
                  <span><?=$one['position']?></span>
                  <p><?=$one['about']?></p>
                  <div class="social">
                  <?php if (isset($one['twitter'])) :?>
                    <a href="<?=$one['twitter']?>"><i class="ri-twitter-fill"></i></a>
                  <?php elseif (isset($one['facebook'])) :?>
                   <a href=""><i class="ri-facebook-fill"></i></a>
                 <?php elseif (isset($one['instagram'])) :?>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                 <?php elseif(isset($one['linkedin'])):?>
                  <a href=""><i class="ri-linkedin-fill"></i></a>
                  <?php else: ?>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                  <?php endif ?>
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
          <h2>БИЗ БИЛАН БОҒЛАНИНГ</h2>
        </div>

        <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

          <div class="col-lg-5">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Manzil:</h4>
                <p>Тошкент шаҳар, 100031, Ракатбоши-15. Мўлжал: Космоновтлар метро бекати.</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>info@muzeyart.uz</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Telefon:</h4>
                <p>(+998)71 256-40-42, (+998)71 256-28-58.</p>
              </div>

            </div>

          </div>

          <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
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
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
