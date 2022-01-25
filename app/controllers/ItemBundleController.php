<?php

namespace app\controllers;

use app\controllers\base\BaseSetupCrudController;
use app\models\ItemBundle;
use Yii;

class ItemBundleController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = ItemBundle::class;

        return parent::init();
    }
}
