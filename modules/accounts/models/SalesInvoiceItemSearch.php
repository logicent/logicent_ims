<?php

namespace crudle\ext\accounts\models;

use crudle\ext\accounts\models\base\BaseTransactionItemSearch;

class SalesInvoiceItemSearch extends BaseTransactionItemSearch
{
    public function init()
    {
        $this->documentModelClass = SalesInvoiceItem::class;
        $this->documentIdAttribute = 'sales_invoice_id';
    }
}
