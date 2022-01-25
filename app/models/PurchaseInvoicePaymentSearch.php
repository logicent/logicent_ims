<?php

namespace app\models;

use app\models\base\BaseTransactionPaymentSearch;
use app\models\PurchaseInvoicePayment;

class PurchaseInvoicePaymentSearch extends BaseTransactionPaymentSearch
{
    public function init()
    {
        $this->documentModelClass = PurchaseInvoicePayment::class;
        $this->documentIdAttribute = 'purchase_invoice_id';
    }
}
