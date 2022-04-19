<?php

namespace logicent\accounts\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\accounts\models\Expense;
use logicent\accounts\models\ExpenseSearch;

class ExpenseController extends BaseCrudController
{
    public function modelClass(): string
    {
        return Expense::class;
    }

    public function searchModelClass(): string
    {
        return ExpenseSearch::class;
    }
}
