<?php

namespace logicent\accounts\controllers;

use app\controllers\base\BaseCrudController;
use logicent\accounts\models\ExpenseType;
use logicent\accounts\models\ExpenseTypeSearch;

class ExpenseTypeController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = ExpenseType::class;
        $this->modelSearchClass = ExpenseTypeSearch::class;

        return parent::init();
    }
}
