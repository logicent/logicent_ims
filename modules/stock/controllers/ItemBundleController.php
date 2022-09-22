<?php

namespace crudle\ext\stock\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\stock\models\ItemBundle;
use crudle\ext\stock\models\ItemBundleItem;
use crudle\ext\stock\models\ItemBundleSearch;

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
