<?php

namespace app\controllers\accounts;

use logicent\accounts\models\accounts\PaymentEntry;
use logicent\accounts\models\accounts\PaymentEntrySearch;
use logicent\accounts\controllers\base\BaseTransactionController;

class PaymentEntryController extends BaseTransactionController
{
    public function init()
    {
        $this->modelClass = PaymentEntry::class;
        $this->modelSearchClass = PaymentEntrySearch::class;

        return parent::init();
    }
}
