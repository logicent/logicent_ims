<?php

namespace logicent\sales\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use logicent\sales\models\CustomerGroup;

class CustomerGroupController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = CustomerGroup::class;

        return parent::init();
    }
}
