<?php

namespace crudle\ext\sales\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\sales\models\CustomerGroup;
use crudle\ext\sales\models\CustomerGroupSearch;

class CustomerGroupController extends BaseCrudController
{
    public function modelClass(): string
    {
        return CustomerGroup::class;
    }

    public function searchModelClass(): string
    {
        return CustomerGroupSearch::class;
    }
}
