<?php

namespace logicent\accounts\controllers;

use app\controllers\base\BaseCrudController;
use logicent\accounts\models\PaymentMethod;
use logicent\accounts\models\PaymentMethodSearch;

class PaymentMethodController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = PaymentMethod::class;
        $this->modelSearchClass = PaymentMethodSearch::class;

        return parent::init();
    }
}
