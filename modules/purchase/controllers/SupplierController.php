<?php

namespace logicent\purchase\controllers;

use app\controllers\base\BaseCrudController;
use logicent\purchase\models\Supplier;
use logicent\purchase\models\SupplierSearch;

class SupplierController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = Supplier::class;
        $this->modelSearchClass = SupplierSearch::class;

        return parent::init();
    }
}
