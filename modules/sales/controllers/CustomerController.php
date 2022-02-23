<?php

namespace logicent\sales\controllers;

use app\controllers\base\BaseCrudController;
use logicent\sales\models\Customer;
use logicent\sales\models\CustomerSearch;

class CustomerController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = Customer::class;
        $this->modelSearchClass = CustomerSearch::class;

        return parent::init();
    }
}
