<?php

namespace logicent\stock\controllers;

use app\controllers\base\BaseCrudController;
use logicent\stock\models\Item;
use logicent\stock\models\ItemSearch;

class ItemController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = Item::class;
        $this->modelSearchClass = ItemSearch::class;

        return parent::init();
    }
}
