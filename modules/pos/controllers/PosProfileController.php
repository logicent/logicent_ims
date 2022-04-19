<?php

namespace logicent\pos\controllers;

use crudle\setup\controllers\base\BaseSettingsController;
use logicent\pos\models\PosProfileForm;

class PosProfileController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return PosProfileForm::class;
    }
}
