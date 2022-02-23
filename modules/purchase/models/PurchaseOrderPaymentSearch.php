<?php

namespace logicent\purchase\models;

use app\models\PurchaseOrderPayment;
use logicent\accounts\models\base\BaseTransactionPaymentSearch;

class PurchaseOrderPaymentSearch extends BaseTransactionPaymentSearch
{
    public function init()
    {
        $this->documentModelClass = PurchaseOrderPayment::class;
        $this->documentIdAttribute = 'purchase_order_id';
    }
}
