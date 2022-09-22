<?php

namespace crudle\ext\accounts\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\accounts\models\ExpenseType;
use crudle\ext\accounts\models\ExpenseTypeSearch;

class ExpenseTypeController extends BaseCrudController
{
    public function modelClass(): string
    {
        return ExpenseType::class;
    }

    public function searchModelClass(): string
    {
        return ExpenseTypeSearch::class;
    }
}
