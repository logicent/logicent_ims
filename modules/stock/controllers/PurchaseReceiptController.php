<?php

namespace crudle\ext\stock\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\stock\models\PurchaseReceipt;
use crudle\ext\stock\models\PurchaseReceiptSearch;

class PurchaseReceiptController extends BaseCrudController
{
    public function modelClass(): string
    {
        return PurchaseReceipt::class;
    }

    public function searchModelClass(): string
    {
        return PurchaseReceiptSearch::class;
    }
}
