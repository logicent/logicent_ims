<?php

namespace crudle\ext\purchase\models;

use crudle\ext\accounts\models\base\BaseTransactionItemSearch;

class PurchaseOrderItemSearch extends BaseTransactionItemSearch
{
    public function init()
    {
        $this->documentModelClass = PurchaseOrderItem::class;
        $this->documentIdAttribute = 'purchase_order_id';
    }
}
