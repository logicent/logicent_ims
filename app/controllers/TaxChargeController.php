<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\TaxCharge;

class TaxChargeController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = TaxCharge::class;

        return parent::init();
    }
}
