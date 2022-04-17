<?php

namespace app\controllers\fleet;

use app\models\fleet\VehicleService;
use app\models\fleet\VehicleServiceSearch;
use app\modules\main\controllers\base\BaseCrudController;

class VehicleServiceController extends BaseCrudController
{
    public function modelClass(): string
    {
        return VehicleService::class;
    }

    public function searchModelClass(): string
    {
        return VehicleServiceSearch::class;
    }
}
