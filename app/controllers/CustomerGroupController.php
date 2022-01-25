<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\CustomerGroup;

class CustomerGroupController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = CustomerGroup::class;

        return parent::init();
    }
}
