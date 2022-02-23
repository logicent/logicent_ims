<?php

namespace logicent\stock\controllers;

use app\controllers\base\BaseCrudController;
use logicent\stock\models\ItemPrice;

class ItemPriceController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = ItemPrice::class;

        return parent::init();
    }
}
