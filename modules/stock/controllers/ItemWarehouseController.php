<?php

namespace logicent\stock\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\stock\models\ItemWarehouse;
use logicent\stock\models\ItemWarehouseSearch;

class ItemWarehouseController extends BaseCrudController
{
    public function modelClass(): string
    {
        return ItemWarehouse::class;
    }

    public function searchModelClass(): string
    {
        return ItemWarehouseSearch::class;
    }
}
