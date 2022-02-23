<?php

namespace logicent\purchase\models;

use logicent\accounts\models\base\BaseTransactionItemSearch;

class PurchaseOrderItemSearch extends BaseTransactionItemSearch
{
    public function init()
    {
        $this->documentModelClass = PurchaseOrderItem::class;
        $this->documentIdAttribute = 'purchase_order_id';
    }
}
