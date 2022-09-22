<?php

namespace crudle\ext\accounts\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\accounts\models\PriceList;
use crudle\ext\accounts\models\PriceListSearch;

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
