<?php

namespace app\models;

use app\models\base\BaseTransactionItemSearch;

class PurchaseOrderItemSearch extends BaseTransactionItemSearch
{
    public function init()
    {
        $this->documentModelClass = PurchaseOrderItem::class;
        $this->documentIdAttribute = 'purchase_order_id';
    }
}
