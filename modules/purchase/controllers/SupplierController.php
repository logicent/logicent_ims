<?php

namespace logicent\purchase\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\purchase\models\Supplier;
use logicent\purchase\models\SupplierSearch;

class SupplierController extends BaseCrudController
{
    public function modelClass(): string
    {
        return Supplier::class;
    }

    public function searchModelClass(): string
    {
        return SupplierSearch::class;
    }
}
