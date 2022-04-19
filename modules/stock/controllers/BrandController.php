<?php

namespace logicent\stock\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\stock\models\Brand;
use logicent\stock\models\BrandSearch;

class BrandController extends BaseCrudController
{
    public function modelClass(): string
    {
        return Brand::class;
    }

    public function searchModelClass(): string
    {
        return BrandSearch::class;
    }
}
