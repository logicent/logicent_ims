<?php

namespace app\controllers;

use logicent\bakery\models\BakeryIngredient;
use logicent\stock\controllers\ItemController;

class IngredientController extends ItemController
{
    public function modelClass(): string
    {
        return BakeryIngredient::class;
    }
}
