<?php

namespace logicent\stock\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use logicent\stock\models\ItemGroup;

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
