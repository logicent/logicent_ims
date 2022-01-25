<?php

namespace app\controllers\setup;

use app\controllers\base\BaseSettingsController;
use app\models\setup\DeveloperSettingsForm;

class DeveloperSettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = DeveloperSettingsForm::class;

        return parent::init();
    }
}
