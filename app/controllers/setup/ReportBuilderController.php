<?php

namespace app\controllers\setup;

use app\controllers\base\BaseSetupCrudController;
use app\models\setup\ReportBuilder;

class ReportBuilderController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = ReportBuilder::class;

        return parent::init();
    }
}
