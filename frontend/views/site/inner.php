<?php

use yii\helpers\Url;

use function PHPSTORM_META\type;

?>

<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-white" style="margin-top: 89px">Kurslar</h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->
<div class="container" style="margin-bottom: 150px; margin-top: 50px">
    <div class="row" style="margin-bottom: 200px">
        <?php foreach ($data as $key => $one):?>
        <div class="col-md-6">
            <a href="<?=Url::to(['registered/create','type' =>$one['id']])?>" style="text-decoration: none;">
                <div class="card cards shadow">
                    <h4 class="p-4 text-center" style="font-family: Sans-serif"><?=$one['name_uz']?> </h4>
                </div>
            </a>
        </div>
        <?php endforeach;?>
        <!-- <div class="col-md-6">
            <a href="" style="text-decoration: none;">
                <div class="card cards shadow">
                    <h3 class="p-4 text-center">Koreys tili <br> o'quv kursi <span class="text-danger">(6 oylik)</span> </h3>
                </div>
            </a>
        </div> -->
    </div>
</div>

