<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\TaxCharge;
use Yii;

class TaxChargeController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = TaxCharge::class;

        return parent::init();
    }
}
