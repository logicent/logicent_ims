<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\SupplierGroup;

class SupplierGroupController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = SupplierGroup::class;

        return parent::init();
    }
}
