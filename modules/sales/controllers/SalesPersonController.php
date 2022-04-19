<?php

namespace logicent\sales\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\sales\models\SalesPerson;
use logicent\sales\models\SalesPersonSearch;

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
