<?php

namespace crudle\ext\pos\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\main\enums\Type_View;

/**
 * Pos controller for the `sales` module
 */
class PosController extends BaseCrudController
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
