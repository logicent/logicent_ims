<?php

namespace app\models;

use app\models\base\BaseTransactionItemSearch;
use app\models\SalesInvoicePayment;

class SalesInvoicePaymentSearch extends BaseTransactionItemSearch
{
    public function init()
    {
        $this->documentModelClass = SalesInvoicePayment::class;
        $this->documentIdAttribute = 'sales_invoice_id';
    }
}
