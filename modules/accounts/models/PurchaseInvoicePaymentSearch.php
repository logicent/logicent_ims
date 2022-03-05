<?php

namespace logicent\accounts\models;

use app\models\PurchaseInvoicePayment;
use logicent\accounts\models\base\BaseTransactionPaymentSearch;

class PurchaseInvoicePaymentSearch extends BaseTransactionPaymentSearch
{
    public function init()
    {
        $this->documentModelClass = PurchaseInvoicePayment::class;
        $this->documentIdAttribute = 'purchase_invoice_id';
    }
}
