<?php

namespace crudle\ext\stock\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\stock\models\ItemUom;
use crudle\ext\stock\models\ItemUomSearch;

class ItemUomController extends BaseCrudController
{
    public function modelClass(): string
    {
        return ItemUom::class;
    }

    public function searchModelClass(): string
    {
        return ItemUomSearch::class;
    }
}
