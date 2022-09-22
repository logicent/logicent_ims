<?php

namespace crudle\ext\sales\controllers;

use crudle\ext\sales\models\Quotation;
use crudle\ext\sales\models\QuotationItem;
use crudle\ext\sales\models\QuotationSearch;
use crudle\ext\accounts\controllers\base\BaseTransactionController;

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
