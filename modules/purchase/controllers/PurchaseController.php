<?php

namespace logicent\purchase\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\main\enums\Type_View;
use Yii;
use yii\helpers\Inflector;

/**
 * Purchase controller for the `purchase` module
 */
class PurchaseController extends BaseCrudController
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
