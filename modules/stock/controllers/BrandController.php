<?php

namespace crudle\ext\stock\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\stock\models\Brand;
use crudle\ext\stock\models\BrandSearch;

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
