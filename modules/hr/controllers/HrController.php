<?php

namespace logicent\hr\controllers;

use crudle\main\controllers\base\BaseCrudController;
use crudle\main\enums\Type_View;

/**
 * Hr controller for the `hr` module
 */
class HrController extends BaseCrudController
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
