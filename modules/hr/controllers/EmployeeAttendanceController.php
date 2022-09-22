<?php

namespace app\controllers\hr;

use app\models\hr\EmployeeAttendance;
use app\models\hr\EmployeeAttendanceSearch;
use crudle\app\main\controllers\base\BaseCrudController;

class EmployeeAttendanceController extends BaseCrudController
{
    public function modelClass(): string
    {
        return EmployeeAttendance::class;
    }

    public function searchModelClass(): string
    {
        return EmployeeAttendanceSearch::class;
    }
}
