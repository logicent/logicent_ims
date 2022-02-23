<?php

namespace logicent\accounts\models;

use logicent\accounts\models\base\BaseTransactionItemSearch;
use logicent\accounts\receivable\SalesInvoicePayment;

class SalesInvoicePaymentSearch extends BaseTransactionItemSearch
{
    public function init()
    {
        $this->documentModelClass = SalesInvoicePayment::class;
        $this->documentIdAttribute = 'sales_invoice_id';
    }
}
