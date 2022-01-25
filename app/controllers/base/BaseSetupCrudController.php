<?php

namespace app\controllers\base;

use Yii;
use yii\data\ActiveDataProvider;

abstract class BaseSetupCrudController extends BaseCrudController
{
    public function init()
    {
        $this->viewPath = Yii::getAlias('@app/views') . '/setup';

        return parent::init();
    }

    public function actionIndex()
    {
        // apply soft delete filter
        $query = $this->modelClass::find()->where(['deleted_at' => null]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false, // check if default sort is defined in model class and apply
            'pagination' => false
        ]);

        return $this->renderAjax('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
