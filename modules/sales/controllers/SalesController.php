<?php

namespace crudle\ext\sales\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\main\enums\Type_View;

/**
 * Sales controller for the `sales` module
 */
class SalesController extends BaseCrudController
{
    public function actions()
    {
        return [
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    // ViewInterface
    public function defaultActionViewType()
    {
        return Type_View::Workspace;
    }

    public function showViewSidebar(): bool
    {
        return false;
    }
}
