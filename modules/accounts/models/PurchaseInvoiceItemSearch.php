<?php

namespace logicent\accounts\models;

use logicent\accounts\models\base\BaseTransactionItemSearch;

class PurchaseInvoiceItemSearch extends BaseTransactionItemSearch
{
    public function init()
    {
        $this->documentModelClass = PurchaseInvoiceItem::class;
        $this->documentIdAttribute = 'purchase_invoice_id';
    }
}
