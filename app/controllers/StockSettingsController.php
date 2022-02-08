<?php

namespace app\controllers;

use app\controllers\base\BaseSettingsController;
use app\models\StockSettingsForm;


class StockSettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = StockSettingsForm::class;

        return parent::init();
    }
}
