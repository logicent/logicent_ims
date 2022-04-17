<?php

namespace logicent\stock\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use logicent\stock\models\ItemPrice;

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
