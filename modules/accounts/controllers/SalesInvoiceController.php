<?php

namespace logicent\accounts\controllers;

use logicent\accounts\controllers\base\BaseTransactionController;
use logicent\accounts\models\SalesInvoice;
use logicent\accounts\models\SalesInvoiceItem;
use logicent\accounts\models\SalesInvoicePayment;
use logicent\accounts\models\SalesInvoiceSearch;

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
