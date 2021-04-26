<?php
namespace backend\widgets;

use yii\base\Widget;

class BreadcrumbWidget extends Widget
{
    public function run()
    {
        return $this->render('breadcrumb');
    }
}
