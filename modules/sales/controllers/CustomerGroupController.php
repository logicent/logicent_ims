<?php

namespace logicent\sales\controllers;

use app\controllers\base\BaseCrudController;
use logicent\sales\models\CustomerGroup;
use logicent\sales\models\CustomerGroupSearch;

class CustomerGroupController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = CustomerGroup::class;
        $this->modelSearchClass = CustomerGroupSearch::class;

        return parent::init();
    }
}
