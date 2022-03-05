<?php

namespace logicent\accounts\controllers;

use app\controllers\base\BaseCrudController;
use logicent\accounts\models\PurchaseTaxCharge;
use logicent\accounts\models\PurchaseTaxChargeSearch;

class PurchaseTaxChargeController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = PurchaseTaxCharge::class;
        $this->modelSearchClass = PurchaseTaxChargeSearch::class;

        return parent::init();
    }
}
