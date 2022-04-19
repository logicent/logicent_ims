<?php

namespace app\controllers\hr;

use app\models\hr\SalaryStructure;
use app\models\hr\SalaryStructureSearch;
use crudle\main\controllers\base\BaseCrudController;

class SalaryStructureController extends BaseCrudController
{
    public function modelClass(): string
    {
        return SalaryStructure::class;
    }

    public function searchModelClass(): string
    {
        return SalaryStructureSearch::class;
    }
}
