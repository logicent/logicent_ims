<?php

namespace logicent\purchase\controllers;

use app\controllers\base\BaseCrudController;
use Yii;
use yii\helpers\Inflector;

/**
 * Default controller for the `purchase` module
 */
class DefaultController extends BaseCrudController
{
    public function init()
    {
        parent::init();

        $this->viewPath = Yii::getAlias('@modules/purchase/views') . '/' . Inflector::underscore(
            Inflector::id2camel($this->id)
        );
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
