<?php

namespace app\controllers\setup;

use app\controllers\base\BaseSettingsController;
use app\models\setup\GlobalSettingsForm;

class GlobalSettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = GlobalSettingsForm::class;
        
        return parent::init();
    }
}
