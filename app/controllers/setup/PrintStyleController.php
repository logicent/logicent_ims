<?php

namespace app\controllers\setup;

use app\controllers\base\BaseSetupCrudController;
use app\models\Setup;
use app\models\setup\PrintStyle;
use Yii;

class PrintStyleController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = PrintStyle::class;

        return parent::init();
    }
}
