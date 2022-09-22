<?php

namespace crudle\ext\fleet\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\main\enums\Type_View;
use Yii;
use yii\helpers\Inflector;

/**
 * Fleet controller for the `fleet` module
 */
class FleetController extends BaseCrudController
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
