<?php

namespace logicent\sales\controllers;

use logicent\sales\models\SalesOrder;
use logicent\sales\models\SalesOrderItem;
use logicent\sales\models\SalesOrderPayment;
use logicent\sales\models\SalesOrderSearch;
use logicent\accounts\controllers\base\BaseTransactionController;

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