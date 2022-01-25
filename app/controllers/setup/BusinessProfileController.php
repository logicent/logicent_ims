<?php

namespace app\controllers\setup;

use app\controllers\base\BaseSettingsController;
use app\models\setup\BusinessProfileForm;

class BusinessProfileController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = BusinessProfileForm::class;
        
        return parent::init();
    }
}
