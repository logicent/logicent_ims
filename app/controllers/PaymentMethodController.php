<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\PaymentMethod;

class PaymentMethodController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = PaymentMethod::class;

        return parent::init();
    }
}
