<?php

namespace app\controllers\fleet;

use app\models\fleet\Vehicle;
use app\models\fleet\VehicleSearch;
use app\modules\main\controllers\base\BaseCrudController;

class VehicleController extends BaseCrudController
{
    public function modelClass(): string
    {
        return Vehicle::class;
    }

    public function searchModelClass(): string
    {
        return VehicleSearch::class;
    }
}
