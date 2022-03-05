<?php

namespace logicent\accounts\controllers;

use app\controllers\base\BaseCrudController;
use logicent\accounts\models\SalesTaxCharge;
use logicent\accounts\models\SalesTaxChargeSearch;

class SalesTaxChargeController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = SalesTaxCharge::class;
        $this->modelSearchClass = SalesTaxChargeSearch::class;

        return parent::init();
    }
}
