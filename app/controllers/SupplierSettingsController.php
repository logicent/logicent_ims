<?php

namespace app\controllers;

use app\controllers\base\BaseSettingsController;
use app\models\SupplierSettingsForm;


class SupplierSettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = SupplierSettingsForm::class;

        return parent::init();
    }
}
