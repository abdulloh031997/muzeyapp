<?php
$url = Yii::getAlias("@fronted_domain");

use yii\helpers\Url;
?>

<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-white" style="margin-top: 89px"><?=$kursname->name_uz?></h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->
<div class="container" style="margin-bottom: 150px; margin-top: 50px">
    <div class="row">
        <?php foreach ($kurslar as $key => $one) : ?>
            <div class="col-md-3 mb-2" aria-disabled="true">
                <a href="<?= Url::to(['site/inner', 'id' => $one['id']]) ?>">
                    <div class="card card_bg" style="height: auto;">
                        <div class="img_box">
                            <img src="<?= $url . '/' . $one['image'] ?>" class="img_cours"  alt="">
                        </div>
                        <div class="text-centrer text_box" style="text-align: center;width: 100%;">
                            <a href="<?= Url::to(['site/inner', 'id' => $one['id']]) ?>" class="nav-link cours_text" style="font-weight: bolder;font-family: Sans-serif ;text-align: center; text-decoration: none;"> <?= $one['name_uz'] ?> </a>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

