<?php

namespace crudle\ext\purchase\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\purchase\models\Supplier;
use crudle\ext\purchase\models\SupplierSearch;

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
