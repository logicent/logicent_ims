<?php

namespace app\controllers;

use app\controllers\base\BaseCrudController;
use app\models\Item;
use app\models\ItemSearch;

class ItemController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = Item::class;
        $this->modelSearchClass = ItemSearch::class;

        return parent::init();
    }
}
