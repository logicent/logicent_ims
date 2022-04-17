<?php

namespace logicent\accounts\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use logicent\accounts\models\PurchaseTaxCharge;
use logicent\accounts\models\PurchaseTaxChargeSearch;

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
