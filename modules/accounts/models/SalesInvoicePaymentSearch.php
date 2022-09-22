<?php

namespace crudle\ext\accounts\models;

use crudle\ext\accounts\models\base\BaseTransactionItemSearch;
use crudle\ext\accounts\receivable\SalesInvoicePayment;

class SalesInvoicePaymentSearch extends BaseTransactionItemSearch
{
    public function init()
    {
        $this->documentModelClass = SalesInvoicePayment::class;
        $this->documentIdAttribute = 'sales_invoice_id';
    }
}
