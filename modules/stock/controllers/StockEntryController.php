<?php

namespace crudle\ext\stock\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\stock\models\StockEntry;
use crudle\ext\stock\models\StockEntryItem;
use crudle\ext\stock\models\StockEntrySearch;

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
