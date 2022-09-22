<?php

namespace crudle\ext\accounts\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\accounts\models\PurchaseTaxCharge;
use crudle\ext\accounts\models\PurchaseTaxChargeSearch;

class PurchaseTaxChargeController extends BaseCrudController
{
    public function modelClass(): string
    {
        return PurchaseTaxCharge::class;
    }

    public function searchModelClass(): string
    {
        return PurchaseTaxChargeSearch::class;
    }
}
