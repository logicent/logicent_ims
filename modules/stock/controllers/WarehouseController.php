<?php

namespace crudle\ext\stock\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\stock\models\Warehouse;
use crudle\ext\stock\models\WarehouseSearch;

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
