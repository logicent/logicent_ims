<?php

namespace logicent\sales\models;

use logicent\accounts\models\base\BaseTransactionPaymentSearch;

class SalesOrderPaymentSearch extends BaseTransactionPaymentSearch
{
    public function init()
    {
        $this->documentModelClass = SalesOrderPayment::class;
        $this->documentIdAttribute = 'sales_order_id';
    }
}
