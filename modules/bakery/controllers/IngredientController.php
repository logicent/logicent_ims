<?php

namespace app\controllers;

use crudle\ext\bakery\models\BakeryIngredient;
use crudle\ext\stock\controllers\ItemController;

class IngredientController extends ItemController
{
    public function modelClass(): string
    {
        return BakeryIngredient::class;
    }
}
