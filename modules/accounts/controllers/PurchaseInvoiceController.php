<?php

namespace logicent\accounts\controllers;

use logicent\accounts\controllers\base\BaseTransactionController;
use logicent\accounts\models\PurchaseInvoice;
use logicent\accounts\models\PurchaseInvoiceItem;
use logicent\accounts\models\PurchaseInvoicePayment;
use logicent\accounts\models\PurchaseInvoiceSearch;

class PurchaseInvoiceController extends BaseTransactionController
{
    public function modelClass(): string
    {
        return PurchaseInvoice::class;
    }

    public function searchModelClass(): string
    {
        return PurchaseInvoiceSearch::class;
    }
}
