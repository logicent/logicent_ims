<?php

namespace logicent\sales\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use logicent\sales\models\CustomerGroup;
use logicent\sales\models\CustomerGroupSearch;

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
