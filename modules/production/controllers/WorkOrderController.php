<?php

namespace app\controllers\production;

use Yii;
use yii\data\ActiveDataProvider;
use app\models\production\WorkOrder;
use app\models\production\WorkOrderSearch;
use app\models\production\WorkOrderItem;
use app\controllers\BreadController;


class WorkOrderController extends BreadController
{
    public function init()
    {
        $this->modelNamespace = 'app\models\production';

        parent::init();
    }

    public function actionRead($id)
    {
        $model = $this->findModel($id);
        
        $model->isReadOnly = true;

        $query = WorkOrderItem::find()->where(['work_order_id' => $model->id]);
        
        $productDataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 0,
            ],
            // 'sort' => [
            //     'defaultOrder' => [
            //         'id' => SORT_ASC, 
            //     ]
            // ],
        ]);
        
        $this->setFormSidebarData($model);
        
        return $this->render('read', [
            'model' => $model,
            'productDataProvider' => $productDataProvider,            
        ]);
    }

    public function actionCreate()
    {
        $model = new WorkOrder();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->stockItem->qty_ordered += $model->product_qty;
            
            $items = Yii::$app->request->post('WorkOrderItem');

            foreach ($items as $item)
            {
                $item_model = new WorkOrderItem();
                $item_model->attributes = $item;
                $item_model->stockItem->qty_reserved += $item_model->qty;
                $item_model->save();
            }
            
            return $this->redirect(['read', 'id' => $model->id]);
        }

        $query = WorkOrderItem::find()->where(['work_order_id' => $model->id]);
        
        $productDataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 0,
            ],
            // 'sort' => [
            //     'defaultOrder' => [
            //         'id' => SORT_ASC, 
            //     ]
            // ],
        ]);
        
        $model->loadDefaultValues();
        
        return $this->render('create', [
            'model' => $model,
            'productDataProvider' => $productDataProvider
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $items = Yii::$app->request->post('WorkOrderItem');
            
            foreach ($items as $item)
            {
                if (empty($item['id']))
                    $item_model = new WorkOrderItem();
                else
                    $item_model = WorkOrderItem::findOne($item['id']);
                $item_model->attributes = $item;
                $item_model->save();
            }
            
            return $this->redirect(['read', 'id' => $model->id]);
        }

        $query = WorkOrderItem::find()->where(['work_order_id' => $model->id]);
        
        $productDataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 0,
            ],
            // 'sort' => [
            //     'defaultOrder' => [
            //         'id' => SORT_ASC, 
            //     ]
            // ],
        ]);

        return $this->render('update', [
            'model' => $model,
            'productDataProvider' => $productDataProvider
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        // check relation dependencies first and either block or allow
        $model->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = WorkOrder::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested record does not exist.'));
    }

    public function actionAddRow()
    {
        $model = new WorkOrderItem();
        $model->work_order_id = Yii::$app->request->get('parent_id');

        return $this->renderAjax('_item', [
            'model' => $model,
        ]);
    }

    public function actionDeleteRow($id)
    {
        $model = WorkOrderItem::findOne($id);
        
        return $model->delete(); // number of deleted rows either 0 or more or false (unsuccessful)
    }    
}
