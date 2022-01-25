<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\Warehouse;

class WarehouseController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = Warehouse::class;

        return parent::init();
    }
}
