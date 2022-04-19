<?php

namespace logicent\stock\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\stock\models\StockEntry;
use logicent\stock\models\StockEntryItem;
use logicent\stock\models\StockEntrySearch;

class StockEntryController extends BaseCrudController
{
    public $itemModelClass;

    public function modelClass(): string
    {
        return StockEntry::class;
    }

    public function searchModelClass(): string
    {
        return StockEntrySearch::class;
    }
}
