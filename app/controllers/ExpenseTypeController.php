<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\ExpenseType;

class ExpenseTypeController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = ExpenseType::class;

        return parent::init();
    }
}
