<?php

namespace logicent\sales\controllers;

use app\modules\setup\controllers\base\BaseSettingsController;
use logicent\sales\models\PosProfileForm;
use yii\helpers\Inflector;

class PosProfileController extends BaseSettingsController
{
    public function init()
    {
        $this->modelClass = PosProfileForm::class;

        parent::init();
        $this->viewPath = \Yii::getAlias('@modules/') . $this->module->id . '/views'
            . '/' . Inflector::underscore(Inflector::id2camel($this->id));
        // return;
    }
}
