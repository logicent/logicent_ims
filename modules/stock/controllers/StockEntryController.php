<?php

namespace logicent\stock\controllers;

use app\controllers\base\BaseCrudController;
use logicent\stock\models\StockEntry;
use logicent\stock\models\StockEntryItem;
use logicent\stock\models\StockEntrySearch;

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
