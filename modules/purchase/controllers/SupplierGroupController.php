<?php

namespace logicent\purchase\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use logicent\purchase\models\SupplierGroup;

class SupplierGroupController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = SupplierGroup::class;

        return parent::init();
    }
}
