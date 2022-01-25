<?php

namespace app\models;

use app\models\base\BaseTransactionPaymentSearch;
use app\models\PurchaseOrderPayment;

class PurchaseOrderPaymentSearch extends BaseTransactionPaymentSearch
{
    public function init()
    {
        $this->documentModelClass = PurchaseOrderPayment::class;
        $this->documentIdAttribute = 'purchase_order_id';
    }
}
