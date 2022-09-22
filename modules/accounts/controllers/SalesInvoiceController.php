<?php

namespace crudle\ext\accounts\controllers;

use crudle\ext\accounts\controllers\base\BaseTransactionController;
use crudle\ext\accounts\models\SalesInvoice;
use crudle\ext\accounts\models\SalesInvoiceItem;
use crudle\ext\accounts\models\SalesInvoicePayment;
use crudle\ext\accounts\models\SalesInvoiceSearch;

class SalesInvoiceController extends BaseTransactionController
{
    public function modelClass(): string
    {
        return SalesInvoice::class;
    }

    public function searchModelClass(): string
    {
        return SalesInvoiceSearch::class;
    }
}
