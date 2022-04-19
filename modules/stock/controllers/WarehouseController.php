<?php

namespace logicent\stock\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\stock\models\Warehouse;
use logicent\stock\models\WarehouseSearch;

class WarehouseController extends BaseCrudController
{
    public function modelClass(): string
    {
        return Warehouse::class;
    }

    public function searchModelClass(): string
    {
        return WarehouseSearch::class;
    }
}
