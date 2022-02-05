<?php

namespace app\controllers\setup;

use app\controllers\base\BaseSetupCrudController;
use app\models\Setup;
use app\models\setup\PrintFormat;
use Yii;

class PrintFormatController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = PrintFormat::class;

        return parent::init();
    }
}
