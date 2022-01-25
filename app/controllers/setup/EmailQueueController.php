<?php

namespace app\controllers\setup;

use app\controllers\base\BaseSetupCrudController;
use app\models\setup\EmailQueue;
use yii\data\ActiveDataProvider;

class EmailQueueController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = EmailQueue::class;

        return parent::init();
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => $this->modelClass::find(), // ->where(['status' => null])->orWhere(['status' => Status_Queue::Error]),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            'pagination' => false
        ]);

        return $this->renderAjax('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
