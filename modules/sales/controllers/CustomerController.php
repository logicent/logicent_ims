<?php

namespace logicent\sales\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\sales\models\Customer;
use logicent\sales\models\CustomerSearch;

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
