<?php

namespace logicent\purchase\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use logicent\purchase\models\SupplierGroup;

class SupplierGroupController extends BaseCrudController
{
    public function modelClass(): string
    {
        return SupplierGroup::class;
    }
}
