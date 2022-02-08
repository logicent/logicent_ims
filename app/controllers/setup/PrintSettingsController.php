<?php

namespace app\controllers\setup;

use app\controllers\base\BaseSettingsController;
use app\models\Setup;
use app\models\setup\PrintSettingsForm;
use Yii;

class PrintSettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = PrintSettingsForm::class;

        return parent::init();
    }
}
