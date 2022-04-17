<?php

namespace logicent\stock\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use logicent\stock\models\ItemBundle;
use logicent\stock\models\ItemBundleItem;

class ItemBundleController extends BaseCrudController
{
    public $itemModelClass;

    public function modelClass(): string
    {
        return ItemBundle::class;
    }

    public function searchModelClass(): string
    {
        return ItemBundleSearch::class;
    }
}
