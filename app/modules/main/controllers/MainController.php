<?php

namespace crudle\main\controllers;

use crudle\main\controllers\base\BaseViewController;
use crudle\main\enums\Type_View;
use Yii;

class MainController extends BaseViewController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        // else
        return $this->render('about');
    }

    public function actionKeyboardShortcuts()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        // else
        return $this->render('keyboard-shortcuts');
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
