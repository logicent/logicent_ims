<?php

namespace crudle\ext\sales\models;

use crudle\ext\accounts\models\base\BaseTransactionPaymentSearch;

class SalesOrderPaymentSearch extends BaseTransactionPaymentSearch
{
    public function init()
    {
        $this->documentModelClass = SalesOrderPayment::class;
        $this->documentIdAttribute = 'sales_order_id';
    }
}
