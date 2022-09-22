<?php

namespace app\controllers\hr;

use app\models\hr\SalaryComponent;
use app\models\hr\SalaryComponentSearch;
use crudle\app\main\controllers\base\BaseCrudController;

class SalaryComponentController extends BaseCrudController
{
    public function modelClass(): string
    {
        return SalaryComponent::class;
    }

    public function searchModelClass(): string
    {
        return SalaryComponentSearch::class;
    }
}
