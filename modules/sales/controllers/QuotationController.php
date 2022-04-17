<?php

namespace logicent\sales\controllers;

use logicent\sales\models\Quotation;
use logicent\sales\models\QuotationItem;
use logicent\sales\models\QuotationSearch;
use logicent\accounts\controllers\base\BaseTransactionController;

class QuotationController extends BaseTransactionController
{
    public function modelClass(): string
    {
        return Quotation::class;
    }

    public function searchModelClass(): string
    {
        return QuotationSearch::class;
    }
}
