<?php

namespace app\controllers\hr;

use app\models\hr\AttendanceTool;
use crudle\main\controllers\base\BaseCrudController;

class AttendanceToolController extends BaseCrudController
{
    public function modelClass(): string
    {
        return AttendanceTool::class;
    }

    // public function searchModelClass(): string
    // {
    //     return AttendanceToolSearch::class;
    // }
}
