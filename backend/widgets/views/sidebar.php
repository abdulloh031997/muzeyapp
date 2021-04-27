<?php
$app = Yii::$app;

use yii\helpers\Url; ?>

<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="<?= Url::to(['/']); ?>" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span><?=\Yii::t('template', 'bosh_sahifa');?></span>
                    </a>
                </li>
                <li class="">
                    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                        <i class="ri-layout-3-line"></i>
                        <span><?=\Yii::t('template', 'post');?></span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="<?= Url::to(['category/index']); ?>"><?=\Yii::t('template', 'category');?></a></li>
                        <li><a href="<?= Url::to(['post/index']); ?>"><?=\Yii::t('template', 'post');?></a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= Url::to(['impressions/index']); ?>" class="waves-effect">
                        <i class=" ri-shield-star-line"></i>
                        <span>Ko'rgazmalar </span>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['partner/index']); ?>" class="waves-effect">
                        <i class=" ri-shield-star-line"></i>
                        <span>Xamkor Tashkilotlar</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['menu/index']); ?>" class="waves-effect">
                        <i class=" ri-shield-star-line"></i>
                        <span>Bo'limlar</span>
                    </a>
                    <a href="<?= Url::to(['team/index']); ?>" class="waves-effect">
                        <i class=" ri-shield-star-line"></i>
                        <span>Team</span>
                    </a>
                </li>
                <li class="">
                    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                        <i class="ri-layout-3-line"></i>
                        <span>Sozlamalar</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="#">Tarjima so'zlar</a></li>
                        <li><a href="#">Till</a></li>
                        <li><a href="#">Banner</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>