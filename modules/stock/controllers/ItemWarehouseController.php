<?php

namespace crudle\ext\stock\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\stock\models\ItemWarehouse;
use crudle\ext\stock\models\ItemWarehouseSearch;

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
