<?php

namespace logicent\accounts\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use logicent\accounts\models\TaxCharge;

class TaxChargeController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = TaxCharge::class;

        return parent::init();
    }
}
