<?php

namespace logicent\purchase\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use logicent\purchase\models\SupplierSettingsForm;
use yii\helpers\Inflector;

class SupplierSettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = SupplierSettingsForm::class;

        parent::init();
        $this->viewPath = \Yii::getAlias('@system_modules/') . $this->module->id . '/views'
            . '/' . Inflector::underscore(Inflector::id2camel($this->id));
        // return;
    }
}
