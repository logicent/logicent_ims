<?php

namespace logicent\sales\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use logicent\sales\models\CustomerSettingsForm;
use yii\helpers\Inflector;

class CustomerSettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = CustomerSettingsForm::class;

        parent::init();
        $this->viewPath = \Yii::getAlias('@system_modules/') . $this->module->id . '/views'
            . '/' . Inflector::underscore(Inflector::id2camel($this->id));
        // return;
    }
}
