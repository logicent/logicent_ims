<?php

namespace app\controllers;

use app\controllers\base\BaseSettingsController;
use app\models\CustomerSettingsForm;


class CustomerSettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = CustomerSettingsForm::class;

        return parent::init();
    }
}
