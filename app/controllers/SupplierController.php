<?php

namespace app\controllers;

use app\controllers\base\BaseController;
use app\controllers\base\BaseCrudController;
use Yii;
use app\models\Supplier;
use app\models\SupplierSearch;

class SupplierController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = Supplier::class;
        $this->modelSearchClass = SupplierSearch::class;

        return parent::init();
    }
}
