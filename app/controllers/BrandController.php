<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\Brand;

class BrandController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = Brand::class;

        return parent::init();
    }
}
