<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\SalesPerson;

class SalesPersonController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = SalesPerson::class;

        return parent::init();
    }
}
