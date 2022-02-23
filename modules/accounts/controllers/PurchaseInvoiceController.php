<?php

namespace logicent\accounts\controllers;

use logicent\accounts\controllers\base\BaseTransactionController;
use logicent\accounts\models\PurchaseInvoice;
use logicent\accounts\models\PurchaseInvoiceItem;
use logicent\accounts\models\PurchaseInvoicePayment;
use logicent\accounts\models\PurchaseInvoiceSearch;

class PurchaseInvoiceController extends BaseTransactionController
{
    public function init()
    {
        $this->modelClass = PurchaseInvoice::class;
        $this->modelSearchClass = PurchaseInvoiceSearch::class;
        $this->itemModelClass = PurchaseInvoiceItem::class;
        $this->paymentModelClass = PurchaseInvoicePayment::class;

        return parent::init();
    }
}
