<?php

namespace logicent\sales\controllers;

use app\controllers\base\BaseCrudController;
use logicent\sales\models\SalesPerson;
use logicent\sales\models\SalesPersonSearch;

class SalesPersonController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = SalesPerson::class;
        $this->modelSearchClass = SalesPersonSearch::class;

        return parent::init();
    }
}
