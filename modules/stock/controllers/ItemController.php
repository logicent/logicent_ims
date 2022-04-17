<?php

namespace logicent\stock\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use logicent\stock\models\Item;
use logicent\stock\models\ItemSearch;

class ItemController extends BaseCrudController
{
    public function modelClass(): string
    {
        return Item::class;
    }

    public function searchModelClass(): string
    {
        return ItemSearch::class;
    }
}
