<?php

namespace app\controllers;

use app\controllers\base\BaseCrudController;
use app\models\Customer;
use app\models\CustomerSearch;

class CustomerController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = Customer::class;
        $this->modelSearchClass = CustomerSearch::class;

        return parent::init();
    }
}
