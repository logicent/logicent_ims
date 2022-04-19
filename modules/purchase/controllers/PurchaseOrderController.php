<?php

namespace logicent\purchase\controllers;

use logicent\accounts\controllers\base\BaseTransactionController;
use logicent\purchase\models\PurchaseOrder;
use logicent\purchase\models\PurchaseOrderItem;
use logicent\purchase\models\PurchaseOrderPayment;
use logicent\purchase\models\PurchaseOrderSearch;

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
