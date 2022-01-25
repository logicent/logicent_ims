<?php

namespace app\controllers;

use app\controllers\base\BaseTransactionController;
use app\models\PurchaseInvoice;
use app\models\PurchaseInvoiceItem;
use app\models\PurchaseInvoicePayment;
use app\models\PurchaseInvoiceSearch;


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
