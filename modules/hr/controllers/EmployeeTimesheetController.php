<?php

namespace app\controllers\hr;

use app\models\hr\EmployeeTimesheet;
use app\models\hr\EmployeeTimesheetSearch;
use crudle\app\main\controllers\base\BaseCrudController;

class EmployeeTimesheetController extends BaseCrudController
{
    public function modelClass(): string
    {
        return EmployeeTimesheet::class;
    }

    public function searchModelClass(): string
    {
        return EmployeeTimesheetSearch::class;
    }
}
