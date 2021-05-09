<section>
    <div class="p-5 bg-dark"></div>
    <div class="p-3 bg-dark">
      <h5 class="text-white text-center p-4"><a href="" class="text-warning"><b>Бош саҳифа</b></a> | <?=$collection['name']?></h5>
    </div>
</section>
  <main id="main">
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="portfolio-details-container">
                <img src="<?=$url.'/'.$collection['image']?>" class="img-fluid" style="width:100% ;height:650px;object-fit: content;" alt="">
            <div class="portfolio-info">
                <h3><?=$collection->collectionCategory->name?></h3>
                <ul>
                <li><strong>Муаллиф</strong>:<?=$collection['author']?></li>
                <li><strong>Техника</strong>:<?=$collection['technique']?></li>
                <li><strong>Хом-ашё</strong>: <?=$collection['materials']?></li>
                <li><strong>Ўлчов</strong>: <?=$collection['size']?></li>
                </ul>
            </div>

            </div>

            <div class="portfolio-description">
            <h2> <?=$collection['name']?></h2>
            <p>
                <?//=$collection['body']?>
            </p>
            </div>

        </div>
    </section><!-- End Portfolio Details Section -->
  </main>