
<div class="col-lg-4">
        <div class="sidebar">
        <h3 class="sidebar-title">Qidirish</h3>
        <div class="sidebar-item search-form">
            <form action="">
            <input type="text">
            <button type="submit"><i class="icofont-search"></i></button>
            </form>
        </div><!-- End sidebar search formn-->
        <h3 class="sidebar-title">Kategoryalar</h3>
        <div class="sidebar-item categories">
            <ul>
                <?php
                use yii\helpers\Url;
                foreach ($category as $index => $one):?>
                <li><a href="<?=Url::to(['site/inner-news','id'=>$one['id']])?>"><?=$one['name']?></a></li>
                <?php endforeach ?>
            </ul>
        </div><!-- End sidebar categories-->
        <h3 class="sidebar-title">So'ngi Yangiliklar</h3>
        <div class="sidebar-item recent-posts">
        <?php  foreach ($post as $index => $one):?>
            <div class="post-item clearfix">
                <img src="<?=$url.'/'.$one['image']?>" alt="">
                <h4><a href="<?=Url::to(['site/inner','id'=>$one['id']])?>"><?=$one['title']?></a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
            </div>
            <?php endforeach ?>
        </div><!-- End sidebar recent posts-->
        </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->
