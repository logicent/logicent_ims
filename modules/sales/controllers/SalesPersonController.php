<?php

namespace logicent\sales\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use logicent\sales\models\SalesPerson;

class SalesPersonController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = SalesPerson::class;

        return parent::init();
    }
}
