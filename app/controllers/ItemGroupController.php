<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\ItemGroup;

class ItemGroupController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = ItemGroup::class;

        return parent::init();
    }
}
