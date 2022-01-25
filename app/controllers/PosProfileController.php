<?php

namespace app\controllers;

use app\controllers\base\BaseSettingsController;
use app\models\PosProfileForm;

class PosProfileController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = PosProfileForm::class;
        
        return parent::init();
    }
}
