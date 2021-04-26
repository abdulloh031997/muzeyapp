<?php
$url = Yii::getAlias("@fronted_domain");
?>
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-white" style="margin-top: 89px">Yangiliklar</h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->
<div class="container" style="margin-bottom: 150px; margin-top: 50px">
    <div class="row" style="margin-bottom: 200px">
        <?php foreach ($data as $key => $one): ?>
        <div class="col-md-4">
            <div class="box">
                <div class="box_inner">
                    <div class="img" style="width: 100%; height: 250px; ">
                        <img src="<?=$url.'/'.$one['image']?>" alt="" style="height: 100%; object-fit: contain">
                    </div>
                    <div class="tex_post">
                        <p class="text-secondary">
                            <?=$one['title']?>
                        </p>
                    </div>
                    <div class="" style="text-align: right;">
                        <a href="<?=\yii\helpers\Url::to(['/site/inner-news','id'=>$one['id']])?>" style="text-decoration: none;background-color: #05059b; padding: 8px; border-radius: 6px; color: aliceblue;">Batafsil</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>