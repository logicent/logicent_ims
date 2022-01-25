<?php

namespace app\controllers;

use app\controllers\base\BaseTransactionController;
use app\models\SalesOrder;
use app\models\SalesOrderItem;
use app\models\SalesOrderPayment;
use app\models\SalesOrderSearch;

class SalesOrderController extends BaseTransactionController
{
    public function init()
    {
        $this->modelClass = SalesOrder::class;
        $this->modelSearchClass = SalesOrderSearch::class;
        $this->itemModelClass = SalesOrderItem::class;
        $this->paymentModelClass = SalesOrderPayment::class;

        return parent::init();
    }
}