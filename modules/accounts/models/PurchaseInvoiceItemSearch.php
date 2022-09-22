<?php

namespace crudle\ext\accounts\models;

use crudle\ext\accounts\models\base\BaseTransactionItemSearch;

class PurchaseInvoiceItemSearch extends BaseTransactionItemSearch
{
    public function init()
    {
        $this->documentModelClass = PurchaseInvoiceItem::class;
        $this->documentIdAttribute = 'purchase_invoice_id';
    }
}
