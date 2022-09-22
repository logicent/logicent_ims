<?php

namespace crudle\ext\stock\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\stock\models\ItemPrice;
use crudle\ext\stock\models\ItemPriceSearch;

class ItemPriceController extends BaseCrudController
{
    public function modelClass(): string
    {
        return ItemPrice::class;
    }

    public function searchModelClass(): string
    {
        return ItemPriceSearch::class;
    }
}
