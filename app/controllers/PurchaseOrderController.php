<?php

namespace app\controllers;

use app\controllers\base\BaseTransactionController;
use app\models\PurchaseOrder;
use app\models\PurchaseOrderItem;
use app\models\PurchaseOrderPayment;
use app\models\PurchaseOrderSearch;

class PurchaseOrderController extends BaseTransactionController
{
    public function init()
    {
        $this->modelClass = PurchaseOrder::class;
        $this->modelSearchClass = PurchaseOrderSearch::class;
        $this->itemModelClass = PurchaseOrderItem::class;
        $this->paymentModelClass = PurchaseOrderPayment::class;

        return parent::init();
    }

}
