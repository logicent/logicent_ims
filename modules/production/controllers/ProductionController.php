<?php

namespace logicent\production\controllers;

use crudle\main\controllers\base\BaseCrudController;
use crudle\main\enums\Type_View;
use Yii;
use yii\helpers\Inflector;

/**
 * Production controller for the `production` module
 */
class ProductionController extends BaseCrudController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    // ViewInterface
    public function currentViewType()
    {
        return Type_View::Workspace;
    }

    public function showViewSidebar(): bool
    {
        return false;
    }
}
