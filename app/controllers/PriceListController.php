<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\PriceList;

class PriceListController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = PriceList::class;

        return parent::init();
    }
}
