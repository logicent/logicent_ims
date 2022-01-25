<?php

namespace app\controllers;

use app\controllers\base\BaseSettingsController;
use app\models\setup\GlobalSettingsForm;
use app\models\Setup;

class SetupController extends BaseSettingsController
{
    public function init()
    {
        $this->sidebar = true;
        $this->sidebarWidth = 'four';
        $this->mainWidth = 'twelve';

        return parent::init();
    }

    public function actionIndex()
    {
        // load the default settings tab
        $model = Setup::getSettings( GlobalSettingsForm::class );

        return $this->render('index', [
            'model' => $model
        ]);
    }
}