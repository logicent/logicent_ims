<?php

namespace logicent\stock\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use logicent\stock\models\ItemUom;

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
