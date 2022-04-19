<?php

namespace logicent\stock\controllers;

use crudle\main\controllers\base\BaseCrudController;
use logicent\stock\models\ItemGroup;
use logicent\stock\models\ItemGroupSearch;

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
