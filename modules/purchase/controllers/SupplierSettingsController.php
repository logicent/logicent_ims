<?php

namespace crudle\ext\purchase\controllers;

use crudle\app\setup\controllers\base\BaseSettingsController;
use crudle\ext\purchase\models\SupplierSettingsForm;

class SupplierSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return SupplierSettingsForm::class;
    }
}
