<?php

namespace logicent\stock\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use logicent\stock\models\ItemWarehouse;

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
