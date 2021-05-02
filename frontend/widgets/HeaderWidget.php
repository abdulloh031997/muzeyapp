<?php

namespace frontend\widgets;

use common\models\Logo;
use common\models\Menu;
use yii\helpers\ArrayHelper;

class HeaderWidget extends \yii\base\Widget
{
    public function run()
    {
        return $this->render("header");
    }

}