<?php

namespace logicent\pos\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use logicent\pos\models\PosProfileForm;
use yii\helpers\Inflector;

class PosProfileController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = PosProfileForm::class;

        parent::init();
        $this->viewPath = \Yii::getAlias('@system_modules/') . $this->module->id . '/views'
            . '/' . Inflector::underscore(Inflector::id2camel($this->id));
        // return;
    }
}
