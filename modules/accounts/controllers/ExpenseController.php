<?php

namespace crudle\ext\accounts\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\accounts\models\Expense;
use crudle\ext\accounts\models\ExpenseSearch;

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
