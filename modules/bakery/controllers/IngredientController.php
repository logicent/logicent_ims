<?php

namespace app\controllers;

use Yii;
use app\models\StockItem;
use app\models\StockItemSearch;
use yii\helpers\ArrayHelper;

class IngredientController extends ItemController
{
    public function actionIndex()
    {
        $searchModel = new StockItemSearch();

        $defaultListFilter = [
            'StockItemSearch' => [
                'item_type' => 'Ingredient'
            ]
        ];
        $dataProvider = $searchModel->search(ArrayHelper::merge($defaultListFilter, Yii::$app->request->queryParams));

        return $this->renderAjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate($id = null)
    {
        $model = new StockItem();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            $model->qty_in_stock = $model->opening_stock;
            if ($model->save(false))
                return $this->redirect(['update', 'id' => $model->id]);
        }

        if (!empty($id))
        {
            // $model->isCopyRecord = true;

            $copyModel = $this->findModel($id);
            $model->attributes = $copyModel->attributes;
        }

        $model->item_type = 'Ingredient';
        $model->is_stock_item = true;
        $model->stock_uom = 'Gram';
        $model->weight_uom = 'Gram';
        
        $model->is_purchase_item = true;

        return $this->render('create', [
            'model' => $model,
        ]);
    }

}
