<?php

namespace logicent\sales\models;

use logicent\accounts\models\base\BaseTransactionItemSearch;

class SalesOrderItemSearch extends BaseTransactionItemSearch
{
    public function init()
    {
        $this->documentModelClass = SalesOrderItem::class;
        $this->documentIdAttribute = 'sales_order_id';
    }
}
