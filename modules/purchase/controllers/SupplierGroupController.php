<?php

namespace logicent\purchase\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\purchase\models\SupplierGroup;
use logicent\purchase\models\SupplierGroupSearch;

class SupplierGroupController extends BaseCrudController
{
    public function modelClass(): string
    {
        return SupplierGroup::class;
    }

    public function searchModelClass(): string
    {
        return SupplierGroupSearch::class;
    }
}
