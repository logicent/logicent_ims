<?php

namespace app\controllers;

use app\controllers\base\BaseCrudController;
use app\models\Expense;
use app\models\ExpenseSearch;

class ExpenseController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = Expense::class;
        $this->modelSearchClass = ExpenseSearch::class;

        return parent::init();
    }
}
