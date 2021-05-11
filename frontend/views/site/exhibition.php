<?php

use yii\helpers\Url;

$url = Yii::getAlias("@fronted_domain");
?>
<style>
 .blog-card {
	 display: flex;
     width: 100%;
	 flex-direction: column;
	 max-width: 1100px;
	 margin: 1.5rem auto;
	 box-shadow: 0 3px 7px -1px rgba(0, 0, 0, 0.1);
	 margin-bottom: 1.6%;
	 background: #fff;
	 line-height: 1.45;
	 font-family: sans-serif;
	 border-radius: 15px;
	 overflow: hidden;
	 z-index: 0;
     border: 1px solid #eeee;
}
 .blog-card a {
	 color: inherit;
}
 .blog-card a:hover {
	 color: #ffc400;
}
 .blog-card:hover .photo {
	 -webkit-transform: scale(1.15) rotate(2deg);
	 transform: scale(1.15) rotate(2deg);
}
 .blog-card .meta {
	 position: relative;
	 z-index: 0;
	 height: 200px;
}
 .blog-card .photo {
	 position: absolute;
	 top: 0;
	 right: 0;
	 bottom: 0;
	 left: 0;
	 background-size: cover;
	 background-position: center;
	 transition: -webkit-transform 0.2s;
	 transition: transform 0.2s;
	 transition: transform 0.2s, -webkit-transform 0.2s;
}
 .blog-card .description {
	 padding: 1rem;
	 background: #fff;
	 position: relative;
	 z-index: 1;
}
 .blog-card .description h1, .blog-card .description h2 {
	 font-family: sans-serif;
}
 .blog-card .description h1 {
	 line-height: 1;
	 margin: 0;
	 font-size: 1.7rem;
}
 .blog-card .description h2 {
	 font-size: 1rem;
	 font-weight: 300;
	 text-transform: uppercase;
	 color: #a2a2a2;
	 margin-top: 5px;
}
 .blog-card .description .read-more {
	 text-align: right;
}
 .blog-card .description .read-more a {
	 color: #ffc400;
	 font-size: 16px;
	 display: inline-block;
	 position: relative;
	 text-decoration: none;
	 background: #fff7de;
	 padding: 5px 15px;
	 border-radius: 15px;
}
 .blog-card .description .read-more a:after {
	 font-family: sans-serif;
	 margin-left: -10px;
	 opacity: 0;
	 vertical-align: middle;
	 transition: margin 0.3s, opacity 0.3s;
}
 .blog-card .description .read-more a:hover:after {
	 margin-left: 5px;
	 opacity: 1;
}
 .blog-card p {
	 position: relative;
	 margin: 1rem 0 0;
	 color: #555;
	 font-size: 13px;
}
 .blog-card p:first-of-type {
	 margin-top: 1.25rem;
}
 .blog-card p:first-of-type:before {
	 content: "";
	 position: absolute;
	 height: 3px;
	 background: #ffc400;
	 width: 75px;
	 top: -1rem;
	 border-radius: 3px;
}
 .blog-card:hover .details {
	 left: 0%;
}
 @media (min-width: 640px) {
	 .blog-card {
		 flex-direction: row;
	}
	 .blog-card .meta {
		 flex-basis: 40%;
		 height: auto;
	}
	 .blog-card .description {
		 flex-basis: 60%;
	}
	 .blog-card .description:before {
		 -webkit-transform: skewX(-3deg);
		 transform: skewX(-3deg);
		 content: "";
		 background: #fff;
		 width: 30px;
		 position: absolute;
		 left: -10px;
		 top: 0;
		 bottom: 0;
		 z-index: -1;
	}
	 .blog-card.alt {
		 flex-direction: row-reverse;
	}
	 .blog-card.alt .description:before {
		 left: inherit;
		 right: -10px;
		 -webkit-transform: skew(3deg);
		 transform: skew(3deg);
	}
	 .blog-card.alt .details {
		 padding-left: 25px;
	}
	 .blog-card p {
		 font-size: 16px;
	}
}
 
</style>
<section>
    <div class="p-5 bg-dark"></div>
    <div class="p-3 bg-dark">
      <h5 class="text-white text-center p-4"><a href="" class="text-warning"><b>Бош саҳифа</b></a> | Кўргазма</h5>
    </div>
  </section>
  <main id="main">

     
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">
        <div class="section-title">
          <h2>Кўргазма</h2>
        </div>
        <div class="row">
        <?php foreach ($impressions as $key => $one):?>
            <div class="blog-card <?=($key % 2 == 1)?'alt':''?>">
                <div class="meta">
                <div class="photo" style="background-image: url(<?=$url.'/'.$one['image']?>)"></div>
                </div>
                <div class="description">
                <h1><?=$one['title']?></h1>
                <h2><?=$one['date']?></h2>
                <p> <?=$one['description']?> </p>
                <p class="read-more">
                    <a href="#">Read More</a>
                </p>
                </div>
            </div>
            <?php endforeach;?>
        </div>
      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->