
<div class="col-lg-3">
    <div class="sidebar">
        <h3 class="sidebar-title">Kategoryalar</h3>
        <div class="sidebar-item categories">
            <ul>
                <?php
                use yii\helpers\Url;
                foreach ($category as $index => $one):?>
                <li><a href="<?=Url::to(['site/collection-all','id'=>$one['id']])?>"><?=$one['name']?></a></li>
                <?php endforeach ?>
            </ul>
        </div><!-- End sidebar categories-->
    </div><!-- End sidebar -->
</div><!-- End blog sidebar -->
