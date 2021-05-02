<?php

namespace frontend\widgets;

use common\models\Logo;
use common\models\Menu;
use common\models\CatSer;
use common\models\Setting;
use yii\helpers\ArrayHelper;

class FooterWidget extends \yii\base\Widget
{
    public function run()
    {
        return $this->render("footer");
    }
}