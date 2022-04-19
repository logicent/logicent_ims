<?php

namespace app\controllers\hr;

use app\models\hr\LeaveApplication;
use crudle\main\controllers\base\BaseCrudController;

class LeaveApplicationController extends BaseCrudController
{
    public function modelClass(): string
    {
        return LeaveApplication::class;
    }

    // public function searchModelClass(): string
    // {
    //     return LeaveApplicationSearch::class;
    // }
}
