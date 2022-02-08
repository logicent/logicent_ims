<?php

namespace app\controllers\setup;

use app\controllers\base\BaseSetupCrudController;
use app\models\setup\EmailForm;

class EmailController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = EmailForm::class;

        return parent::init();
    }

    public function actionIndex()
    {
        $model = new EmailForm();

        return $this->renderAjax('/email', [
                    'model' => $model
                ]);
    }
}
