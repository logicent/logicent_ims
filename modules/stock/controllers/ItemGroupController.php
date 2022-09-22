<?php

namespace crudle\ext\stock\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\stock\models\ItemGroup;
use crudle\ext\stock\models\ItemGroupSearch;

class ItemGroupController extends BaseCrudController
{
    public function modelClass(): string
    {
        return ItemGroup::class;
    }

    public function searchModelClass(): string
    {
        return ItemGroupSearch::class;
    }
}
