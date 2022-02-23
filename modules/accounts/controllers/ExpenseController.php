<?php

namespace logicent\accounts\controllers;

use app\controllers\base\BaseCrudController;
use logicent\accounts\models\Expense;
use logicent\accounts\models\ExpenseSearch;

class ExpenseController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = Expense::class;
        $this->modelSearchClass = ExpenseSearch::class;

        return parent::init();
    }
}
