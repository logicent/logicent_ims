<?php

namespace logicent\stock\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use logicent\stock\models\ItemGroup;

class ItemGroupController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = ItemGroup::class;

        return parent::init();
    }
}
