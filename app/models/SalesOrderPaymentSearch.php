<?php

namespace app\models;

use app\models\base\BaseTransactionPaymentSearch;
use app\models\SalesOrderPayment;

class SalesOrderPaymentSearch extends BaseTransactionPaymentSearch
{
    public function init()
    {
        $this->documentModelClass = SalesOrderPayment::class;
        $this->documentIdAttribute = 'sales_order_id';
    }
}
