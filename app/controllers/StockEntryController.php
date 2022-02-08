<?php

namespace app\controllers;

use app\controllers\base\BaseCrudController;
use app\models\StockEntry;
use app\models\StockEntryItem;
use app\models\StockEntrySearch;

class StockEntryController extends BaseCrudController
{
    public $itemModelClass;

    public function init()
    {
        $this->modelClass = StockEntry::class;
        $this->modelSearchClass = StockEntrySearch::class;
        $this->itemModelClass = StockEntryItem::class;

        return parent::init();
    }
}
