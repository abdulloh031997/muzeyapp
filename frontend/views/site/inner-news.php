<?php

use yii\helpers\Url;

use function PHPSTORM_META\type;

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
            <div class="col-md-12">
                    <div class="card cards shadow p-3">
                        <h3 class="p-4 text-center"><?=$data_inner['title']?> </h3>
                        <p>
                            <?=$data_inner['body']?>
                        </p>
                    </div>
            </div>
        <!-- <div class="col-md-6">
            <a href="" style="text-decoration: none;">
                <div class="card cards shadow">
                    <h3 class="p-4 text-center">Koreys tili <br> o'quv kursi <span class="text-danger">(6 oylik)</span> </h3>
                </div>
            </a>
        </div> -->
    </div>
</div>

