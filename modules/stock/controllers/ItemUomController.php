<?php

namespace logicent\stock\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\stock\models\ItemUom;
use logicent\stock\models\ItemUomSearch;

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
