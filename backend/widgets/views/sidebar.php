<?php

use common\models\Registred;

$app = Yii::$app;
$count = Registred::find()->count();
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
                <li>
                    <a href="<?= Url::to(['registred/index']); ?>" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span><?=\Yii::t('template', 'blet');?></span>
                        <span class="badge badge-pill badge-success float-right"><?=$count?></span>
                    </a>
                </li>
                <li>
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
                    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                        <i class="ri-layout-3-line"></i>
                        <span><?=\Yii::t('template', 'collection');?></span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="<?= Url::to(['collection-category/index']); ?>"><?=\Yii::t('template', 'category');?></a></li>
                        <li><a href="<?= Url::to(['collection/index']); ?>"><?=\Yii::t('template', 'collection');?></a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= Url::to(['impressions/index']); ?>" class="waves-effect">
                        <i class=" ri-shield-star-line"></i>
                        <span><?=\Yii::t('template', 'impressions');?> </span>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['partner/index']); ?>" class="waves-effect">
                        <i class=" ri-shield-star-line"></i>
                        <span><?=\Yii::t('template', 'partner_organizations');?></span>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['menu/index']); ?>" class="waves-effect">
                        <i class=" ri-shield-star-line"></i>
                        <span><?=\Yii::t('template', 'menu');?></span>
                    </a>
                    <a href="<?= Url::to(['team/index']); ?>" class="waves-effect">
                        <i class=" ri-shield-star-line"></i>
                        <span> <?=\Yii::t('template', 'team');?></span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                        <i class="ri-layout-3-line"></i>
                        <span> <?=\Yii::t('template', 'settings');?></span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="<?= Url::to(['#']); ?>"> <?=\Yii::t('template', 'translate');?></a></li>
                        <li><a href="<?= Url::to(['language/index']); ?>"> <?=\Yii::t('template', 'lang');?></a></li>
                        <li><a href="<?= Url::to(['banner/index']); ?>"> <?=\Yii::t('template', 'banner');?></a></li>
                        <li><a href="<?= Url::to(['logo/index']); ?>"> <?=\Yii::t('template', 'logo');?></a></li>
                        <li><a href="<?= Url::to(['about/index']); ?>"> <?=\Yii::t('template', 'about');?></a></li>
                        <li><a href="<?= Url::to(['slider/index']); ?>"> <?=\Yii::t('template', 'slider');?></a></li>
                        <li><a href="<?= Url::to(['page/index']); ?>"> <?=\Yii::t('template', 'page');?></a></li>
                        <li><a href="<?= Url::to(['setting/index']); ?>"> <?=\Yii::t('template', 'settings');?></a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>