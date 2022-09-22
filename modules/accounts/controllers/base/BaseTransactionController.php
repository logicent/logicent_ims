<?php

namespace crudle\ext\accounts\controllers\base;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\ext\stock\models\Item;
use Yii;

class BaseTransactionController extends BaseCrudController
{
    public $itemModelClass;
    public $paymentModelClass;

    public function actionGetItem($id)
    {
        if ( Yii::$app->request->isAjax )
        {
            $model = Item::findOne(Yii::$app->request->get('item_id'));

            return $this->asJson($model->attributes);
        }
        // else
        Yii::$app->end();
    }
}
