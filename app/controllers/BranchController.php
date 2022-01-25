<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\Branch;

class BranchController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = Branch::class;

        return parent::init();
    }
}
