<?php

namespace app\controllers\setup;

use app\controllers\base\BaseSetupCrudController;
use app\models\setup\EmailNotification;

class EmailNotificationController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = EmailNotification::class;
        
        return parent::init();
    }
}
