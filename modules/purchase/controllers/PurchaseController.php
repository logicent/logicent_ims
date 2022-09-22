<?php

namespace crudle\ext\purchase\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\main\enums\Type_View;
use Yii;
use yii\helpers\Inflector;

/**
 * Purchase controller for the `purchase` module
 */
class PurchaseController extends BaseCrudController
{
    public function actions()
    {
        return [
        ];
    }

    public function defaultActionViewType()
    {
        return Type_View::Workspace;
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
