<?php

namespace app\controllers\hr;

use app\models\hr\SalarySlip;
use app\models\hr\SalarySlipSearch;
use app\modules\main\controllers\base\BaseCrudController;

class SalarySlipController extends BaseCrudController
{
    public function modelClass(): string
    {
        return SalarySlip::class;
    }

    public function searchModelClass(): string
    {
        return SalarySlipSearch::class;
    }
}
