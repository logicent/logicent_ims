<?php

namespace crudle\ext\sales\controllers;

use crudle\ext\sales\models\SalesOrder;
use crudle\ext\sales\models\SalesOrderItem;
use crudle\ext\sales\models\SalesOrderPayment;
use crudle\ext\sales\models\SalesOrderSearch;
use crudle\ext\accounts\controllers\base\BaseTransactionController;

class SalesOrderController extends BaseTransactionController
{
    public function modelClass(): string
    {
        return SalesOrder::class;
    }

    public function searchModelClass(): string
    {
        return SalesOrderSearch::class;
    }
}