<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\ItemUom;

class ItemUomController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = ItemUom::class;

        return parent::init();
    }
}
