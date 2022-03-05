<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\BakeryIngredient;
use Yii;
use app\models\RecipeSearch;

class RecipeController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = BakeryIngredient::class;
        $this->modelSearchClass = RecipeSearch::class;

        return parent::init();
    }
}
