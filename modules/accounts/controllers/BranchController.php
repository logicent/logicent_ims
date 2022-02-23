<?php

namespace logicent\accounts\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use logicent\accounts\models\Branch;

class BranchController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = Branch::class;

        return parent::init();
    }
}
