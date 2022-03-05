<?php

namespace logicent\sales\controllers;

use logicent\sales\models\Quotation;
use logicent\sales\models\QuotationItem;
use logicent\sales\models\QuotationSearch;
use logicent\accounts\controllers\base\BaseTransactionController;

class QuotationController extends BaseTransactionController
{
    public function init()
    {
        $this->modelClass = Quotation::class;
        $this->modelSearchClass = QuotationSearch::class;
        $this->itemModelClass = QuotationItem::class;

        return parent::init();
    }

}
