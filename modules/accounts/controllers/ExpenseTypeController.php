<?php

namespace logicent\accounts\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use logicent\accounts\models\ExpenseType;
use logicent\accounts\models\ExpenseTypeSearch;

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
