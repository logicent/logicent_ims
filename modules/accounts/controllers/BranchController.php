<?php

namespace crudle\ext\accounts\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\accounts\models\Branch;
use crudle\ext\accounts\models\BranchSearch;

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
