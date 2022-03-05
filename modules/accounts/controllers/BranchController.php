<?php

namespace logicent\accounts\controllers;

use app\controllers\base\BaseCrudController;
use logicent\accounts\models\Branch;
use logicent\accounts\models\BranchSearch;

class BranchController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = Branch::class;
        $this->modelSearchClass = BranchSearch::class;

        return parent::init();
    }
}
