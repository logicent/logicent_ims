<?php

namespace crudle\ext\pos\controllers;

use crudle\app\setup\controllers\base\BaseSettingsController;
use crudle\ext\pos\models\PosProfileForm;

class PosProfileController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return PosProfileForm::class;
    }
}
