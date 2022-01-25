<?php

namespace app\controllers\setup;

use app\controllers\base\BaseSetupCrudController;
use app\models\setup\ReportBuilder;
use app\models\setup\ReportBuilderItem;

class ReportBuilderController extends BaseSetupCrudController
{
    public $columnModelClass;

    public function init()
    {
        $this->modelClass = ReportBuilder::class;
        $this->columnModelClass = ReportBuilderItem::class;

        return parent::init();
    }
}
