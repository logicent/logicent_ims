<?php

namespace crudle\ext\sales\controllers;

use crudle\app\setup\controllers\base\BaseSettingsController;
use crudle\ext\sales\models\CustomerSettingsForm;

class CustomerSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return CustomerSettingsForm::class;
    }
}
