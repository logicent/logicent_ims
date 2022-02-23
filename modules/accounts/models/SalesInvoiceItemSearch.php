<?php

namespace logicent\accounts\models;

use logicent\accounts\models\base\BaseTransactionItemSearch;

class SalesInvoiceItemSearch extends BaseTransactionItemSearch
{
    public function init()
    {
        $this->documentModelClass = SalesInvoiceItem::class;
        $this->documentIdAttribute = 'sales_invoice_id';
    }
}
