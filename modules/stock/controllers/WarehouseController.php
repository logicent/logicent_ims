<?php

namespace logicent\stock\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use logicent\stock\models\Warehouse;

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
