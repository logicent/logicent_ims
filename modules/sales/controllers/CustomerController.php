<?php

namespace crudle\ext\sales\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\sales\models\Customer;
use crudle\ext\sales\models\CustomerSearch;

class CustomerController extends BaseCrudController
{
    public function modelClass(): string
    {
        return Customer::class;
    }

    public function searchModelClass(): string
    {
        return CustomerSearch::class;
    }
}
