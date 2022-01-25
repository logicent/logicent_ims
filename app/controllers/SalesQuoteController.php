<?php

namespace app\controllers;

use app\controllers\base\BaseTransactionController;
use app\models\SalesQuote;
use app\models\SalesQuoteItem;
use app\models\SalesQuoteSearch;


class SalesQuoteController extends BaseTransactionController
{
    public function init()
    {
        $this->modelClass = SalesQuote::class;
        $this->modelSearchClass = SalesQuoteSearch::class;
        $this->itemModelClass = SalesQuoteItem::class;

        return parent::init();
    }

}
