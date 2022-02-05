<?php

namespace app\controllers\setup;

use app\controllers\base\BaseSettingsController;
use app\models\Setup;
use app\models\setup\PrinterSettingsForm;
use Yii;

class PrinterSettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = PrinterSettingsForm::class;

        return parent::init();
    }
}
