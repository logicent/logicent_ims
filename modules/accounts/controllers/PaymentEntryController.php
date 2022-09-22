<?php

namespace app\controllers\accounts;

use crudle\ext\accounts\models\accounts\PaymentEntry;
use crudle\ext\accounts\models\accounts\PaymentEntrySearch;
use crudle\ext\accounts\controllers\base\BaseTransactionController;

class PaymentEntryController extends BaseTransactionController
{
    public function modelClass(): string
    {
        return PaymentEntry::class;
    }

    public function searchModelClass(): string
    {
        return PaymentEntrySearch::class;
    }
}
