<?php

namespace logicent\pos\controllers;

use crudle\main\controllers\base\BaseCrudController;
use crudle\main\enums\Type_View;

/**
 * Pos controller for the `sales` module
 */
class PosController extends BaseCrudController
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
