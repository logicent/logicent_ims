<?php

namespace logicent\stock\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use logicent\stock\models\ItemUom;

class ItemUomController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = ItemUom::class;

        return parent::init();
    }
}
