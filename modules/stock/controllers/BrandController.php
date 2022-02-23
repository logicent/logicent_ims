<?php

namespace logicent\stock\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use logicent\stock\models\Brand;

class BrandController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = Brand::class;

        return parent::init();
    }
}
