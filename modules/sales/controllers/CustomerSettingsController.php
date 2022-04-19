<?php

namespace logicent\sales\controllers;

use crudle\setup\controllers\base\BaseSettingsController;
use logicent\sales\models\CustomerSettingsForm;

class CustomerSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return CustomerSettingsForm::class;
    }
}
