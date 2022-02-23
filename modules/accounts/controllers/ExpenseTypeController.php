<?php

namespace logicent\accounts\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use logicent\accounts\models\ExpenseType;

class ExpenseTypeController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = ExpenseType::class;

        return parent::init();
    }
}
