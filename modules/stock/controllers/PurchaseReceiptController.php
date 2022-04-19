<?php

namespace logicent\stock\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\stock\models\PurchaseReceipt;
use logicent\stock\models\PurchaseReceiptSearch;

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
