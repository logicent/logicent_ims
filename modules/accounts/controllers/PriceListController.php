<?php

namespace logicent\accounts\controllers;

use app\controllers\base\BaseCrudController;
use logicent\accounts\models\PriceList;
use logicent\accounts\models\PriceListSearch;

class PriceListController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = PriceList::class;
        $this->modelSearchClass = PriceListSearch::class;

        return parent::init();
    }
}
