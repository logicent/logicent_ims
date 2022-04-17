<?php

namespace logicent\sales\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\main\enums\Type_View;
use Yii;
use yii\helpers\Inflector;

/**
 * Sales controller for the `sales` module
 */
class SalesController extends BaseCrudController
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
