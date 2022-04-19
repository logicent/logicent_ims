<?php

namespace app\controllers\fleet;

use app\models\fleet\VehicleLog;
use app\models\fleet\VehicleLogSearch;
use crudle\main\controllers\base\BaseCrudController;

class VehicleLogController extends BaseCrudController
{
    public function modelClass(): string
    {
        return VehicleLog::class;
    }

    public function searchModelClass(): string
    {
        return VehicleLogSearch::class;
    }
}
