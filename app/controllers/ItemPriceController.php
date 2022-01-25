<?php

namespace app\controllers;

use app\controllers\base\BaseCrudController;
use app\models\ItemPrice;

class ItemPriceController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = ItemPrice::class;

        return parent::init();
    }
}
