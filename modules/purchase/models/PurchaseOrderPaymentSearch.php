<?php

namespace crudle\ext\purchase\models;

use app\models\PurchaseOrderPayment;
use crudle\ext\accounts\models\base\BaseTransactionPaymentSearch;

class PurchaseOrderPaymentSearch extends BaseTransactionPaymentSearch
{
    public function init()
    {
        $this->documentModelClass = PurchaseOrderPayment::class;
        $this->documentIdAttribute = 'purchase_order_id';
    }
}
