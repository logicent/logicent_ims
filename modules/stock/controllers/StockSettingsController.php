<?php

namespace logicent\stock\controllers;

use crudle\setup\controllers\base\BaseSettingsController;
use logicent\stock\models\StockSettingsForm;

class StockSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return StockSettingsForm::class;
    }
}
