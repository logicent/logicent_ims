<?php

namespace app\controllers\hr;

use app\models\hr\Employee;
use app\models\hr\EmployeeSearch;
use app\modules\main\controllers\base\BaseCrudController;

class EmployeeController extends BaseCrudController
{
    public function modelClass(): string
    {
        return Employee::class;
    }

    public function searchModelClass(): string
    {
        return EmployeeSearch::class;
    }
}
