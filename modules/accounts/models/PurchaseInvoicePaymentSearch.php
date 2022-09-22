<?php

namespace crudle\ext\accounts\models;

use app\models\PurchaseInvoicePayment;
use crudle\ext\accounts\models\base\BaseTransactionPaymentSearch;

class PurchaseInvoicePaymentSearch extends BaseTransactionPaymentSearch
{
    public function init()
    {
        $this->documentModelClass = PurchaseInvoicePayment::class;
        $this->documentIdAttribute = 'purchase_invoice_id';
    }
}
