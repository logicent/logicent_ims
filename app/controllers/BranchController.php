<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\Branch;
use Yii;

class BranchController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = Branch::class;

        return parent::init();
    }
}
