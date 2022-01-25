<?php

namespace app\models;

use app\models\base\BaseTransactionItemSearch;

class SalesOrderItemSearch extends BaseTransactionItemSearch
{
    public function init()
    {
        $this->documentModelClass = SalesOrderItem::class;
        $this->documentIdAttribute = 'sales_order_id';
    }
}
