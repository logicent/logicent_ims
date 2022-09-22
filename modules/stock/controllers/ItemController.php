<?php

namespace crudle\ext\stock\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\stock\models\Item;
use crudle\ext\stock\models\ItemSearch;

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
