<?php

namespace logicent\accounts\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use logicent\accounts\models\Branch;
use logicent\accounts\models\BranchSearch;

class BranchController extends BaseCrudController
{
    public function modelClass(): string
    {
        return Branch::class;
    }

    public function searchModelClass(): string
    {
        return BranchSearch::class;
    }
}
