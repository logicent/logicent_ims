<?php

namespace crudle\ext\accounts\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\accounts\models\PaymentMethod;
use crudle\ext\accounts\models\PaymentMethodSearch;

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
