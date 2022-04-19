<?php

namespace logicent\accounts\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\accounts\models\PriceList;
use logicent\accounts\models\PriceListSearch;

class PriceListController extends BaseCrudController
{
    public function modelClass(): string
    {
        return PriceList::class;
    }

    public function searchModelClass(): string
    {
        return PriceListSearch::class;
    }
}
