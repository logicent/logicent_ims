<?php

namespace logicent\accounts\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use logicent\accounts\models\PaymentMethod;

class PaymentMethodController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = PaymentMethod::class;

        return parent::init();
    }
}
