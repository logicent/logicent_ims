<?php

namespace crudle\ext\stock\controllers;

use crudle\app\setup\controllers\base\BaseSettingsController;
use crudle\ext\stock\models\StockSettingsForm;

class StockSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return StockSettingsForm::class;
    }
}
