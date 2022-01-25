<?php

namespace app\controllers;

use app\controllers\base\BaseTransactionController;
use app\models\SalesInvoice;
use app\models\SalesInvoiceItem;
use app\models\SalesInvoicePayment;
use app\models\SalesInvoiceSearch;

class SalesInvoiceController extends BaseTransactionController
{
    public function init()
    {
        $this->modelClass = SalesInvoice::class;
        $this->modelSearchClass = SalesInvoiceSearch::class;
        $this->itemModelClass = SalesInvoiceItem::class;
        $this->paymentModelClass = SalesInvoicePayment::class;

        return parent::init();
    }
}
