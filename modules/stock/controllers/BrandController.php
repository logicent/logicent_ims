<?php

namespace logicent\stock\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use logicent\stock\models\Brand;

class BrandController extends BaseCrudController
{
    public function modelClass(): string
    {
        return Brand::class;
    }
}
