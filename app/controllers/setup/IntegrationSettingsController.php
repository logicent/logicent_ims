<?php

namespace app\controllers\setup;

use app\controllers\base\BaseSettingsController;
use app\models\setup\IntegrationSettingsForm;

class IntegrationSettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = IntegrationSettingsForm::class;
        
        return parent::init();
    }
}
