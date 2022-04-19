<?php

namespace logicent\stock\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\stock\models\ItemPrice;
use logicent\stock\models\ItemPriceSearch;

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
