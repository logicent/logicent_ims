<?php

namespace logicent\accounts\controllers;

use logicent\accounts\controllers\base\BaseTransactionController;
use logicent\accounts\models\SalesInvoice;
use logicent\accounts\models\SalesInvoiceItem;
use logicent\accounts\models\SalesInvoicePayment;
use logicent\accounts\models\SalesInvoiceSearch;

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
