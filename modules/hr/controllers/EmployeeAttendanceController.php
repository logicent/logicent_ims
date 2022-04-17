<?php

namespace app\controllers\hr;

use app\models\hr\EmployeeAttendance;
use app\models\hr\EmployeeAttendanceSearch;
use app\modules\main\controllers\base\BaseCrudController;

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
