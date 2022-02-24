<?php

namespace logicent\stock\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use logicent\stock\models\ItemWarehouse;

class ItemWarehouseController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = ItemWarehouse::class;

        return parent::init();
    }
}
