<?php

namespace logicent\accounts\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\accounts\models\PaymentMethod;
use logicent\accounts\models\PaymentMethodSearch;

class PaymentMethodController extends BaseCrudController
{
    public function modelClass(): string
    {
        return PaymentMethod::class;
    }

    public function searchModelClass(): string
    {
        return PaymentMethodSearch::class;
    }
}
