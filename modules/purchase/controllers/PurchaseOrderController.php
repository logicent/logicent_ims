<?php

namespace crudle\ext\purchase\controllers;

use crudle\ext\accounts\controllers\base\BaseTransactionController;
use crudle\ext\purchase\models\PurchaseOrder;
use crudle\ext\purchase\models\PurchaseOrderItem;
use crudle\ext\purchase\models\PurchaseOrderPayment;
use crudle\ext\purchase\models\PurchaseOrderSearch;

class PurchaseOrderController extends BaseTransactionController
{
    public function init()
    {
        $this->itemModelClass = PurchaseOrderItem::class;
        $this->paymentModelClass = PurchaseOrderPayment::class;

        return parent::init();
    }

    public function modelClass(): string
    {
        return PurchaseOrder::class;
    }

    public function searchModelClass(): string
    {
        return PurchaseOrderSearch::class;
    }
}
