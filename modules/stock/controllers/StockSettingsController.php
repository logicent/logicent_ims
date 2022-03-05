<?php

namespace logicent\stock\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use logicent\stock\models\StockSettingsForm;
use yii\helpers\Inflector;

class StockSettingsController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = StockSettingsForm::class;

        parent::init();
        $this->viewPath = \Yii::getAlias('@system_modules/') . $this->module->id . '/views'
            . '/' . Inflector::underscore(Inflector::id2camel($this->id));
        // return;
    }
}
