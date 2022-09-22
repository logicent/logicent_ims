<?php

namespace crudle\ext\sales\models;

use crudle\ext\accounts\models\base\BaseTransactionItemSearch;

class SalesOrderItemSearch extends BaseTransactionItemSearch
{
    public function init()
    {
        $this->documentModelClass = SalesOrderItem::class;
        $this->documentIdAttribute = 'sales_order_id';
    }
}
