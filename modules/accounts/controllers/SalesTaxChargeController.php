<?php

namespace logicent\accounts\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\accounts\models\SalesTaxCharge;
use logicent\accounts\models\SalesTaxChargeSearch;

class SalesTaxChargeController extends BaseCrudController
{
    public function modelClass(): string
    {
        return SalesTaxCharge::class;
    }

    public function searchModelClass(): string
    {
        return SalesTaxChargeSearch::class;
    }
}
