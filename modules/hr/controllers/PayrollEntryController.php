<?php

namespace app\controllers\hr;

use app\models\hr\PayrollEntry;
use app\models\hr\PayrollEntrySearch;
use crudle\app\main\controllers\base\BaseCrudController;

class PayrollEntryController extends BaseCrudController
{
    public function modelClass(): string
    {
        return PayrollEntry::class;
    }

    public function searchModelClass(): string
    {
        return PayrollEntrySearch::class;
    }
}
