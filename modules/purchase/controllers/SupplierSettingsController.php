<?php

namespace logicent\purchase\controllers;

use crudle\setup\controllers\base\BaseSettingsController;
use logicent\purchase\models\SupplierSettingsForm;

class SupplierSettingsController extends BaseSettingsController
{
    public function modelClass(): string
    {
        return SupplierSettingsForm::class;
    }
}
