<?php

namespace crudle\ext\accounts\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\accounts\models\SalesTaxCharge;
use crudle\ext\accounts\models\SalesTaxChargeSearch;

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
