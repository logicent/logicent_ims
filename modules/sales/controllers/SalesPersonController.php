<?php

namespace crudle\ext\sales\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\sales\models\SalesPerson;
use crudle\ext\sales\models\SalesPersonSearch;

class SalesPersonController extends BaseCrudController
{
    public function modelClass(): string
    {
        return SalesPerson::class;
    }

    public function searchModelClass(): string
    {
        return SalesPersonSearch::class;
    }
}
