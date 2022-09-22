<?php

namespace crudle\ext\accounts\controllers;

use crudle\ext\accounts\controllers\base\BaseTransactionController;
use crudle\ext\accounts\models\PurchaseInvoice;
use crudle\ext\accounts\models\PurchaseInvoiceItem;
use crudle\ext\accounts\models\PurchaseInvoicePayment;
use crudle\ext\accounts\models\PurchaseInvoiceSearch;

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
