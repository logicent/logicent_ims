<?php

namespace app\controllers\accounts;

use logicent\accounts\models\accounts\PaymentEntry;
use logicent\accounts\models\accounts\PaymentEntrySearch;
use logicent\accounts\controllers\base\BaseTransactionController;

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
