<?php

namespace logicent\stock\controllers;

use app\controllers\base\BaseCrudController;
use logicent\stock\models\PurchaseReceipt;
use logicent\stock\models\PurchaseReceiptSearch;

class PurchaseReceiptController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = PurchaseReceipt::class;
        $this->modelSearchClass = PurchaseReceiptSearch::class;

        return parent::init();
    }
}
