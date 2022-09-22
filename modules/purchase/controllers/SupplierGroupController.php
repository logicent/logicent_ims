<?php

namespace crudle\ext\purchase\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\purchase\models\SupplierGroup;
use crudle\ext\purchase\models\SupplierGroupSearch;

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
