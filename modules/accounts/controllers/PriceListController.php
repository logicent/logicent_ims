<?php

namespace logicent\accounts\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use logicent\accounts\models\PriceList;

class PriceListController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = PriceList::class;

        return parent::init();
    }
}
