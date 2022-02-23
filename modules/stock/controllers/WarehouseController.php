<?php

namespace logicent\stock\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use logicent\stock\models\Warehouse;

class WarehouseController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = Warehouse::class;

        return parent::init();
    }
}
