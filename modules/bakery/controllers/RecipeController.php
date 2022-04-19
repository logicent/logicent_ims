<?php

namespace app\controllers;

use app\models\BakeryIngredient;
use app\models\RecipeSearch;
use crudle\main\controllers\base\BaseCrudController;
use Yii;

class RecipeController extends BaseCrudController
{
    public function modelClass(): string
    {
        return BakeryIngredient::class;
    }

    public function searchModelClass(): string
    {
        return RecipeSearch::class;
    }
}
