<?php

namespace app\controllers;

use Yii;
use app\models\BakeryCost;
use app\models\BakeryIngredient;
use app\models\Product;
use app\models\ProductSearch;
use app\models\StockItem;
use app\models\StockItemSearch;
use yii\helpers\ArrayHelper;

class ProductController extends ItemController
{
    public function init()
    {
        $this->modelClass = Product::class;
        $this->modelSearchClass = ProductSearch::class;

        return parent::init();
    }

    public function actionIndex()
    {
        $searchModel = new StockItemSearch();

        $defaultListFilter = [
            'StockItemSearch' => [
                'item_type' => 'Baked Good'
            ]
        ];

        $dataProvider = $searchModel->search(ArrayHelper::merge($defaultListFilter, Yii::$app->request->queryParams));

        $this->sidebar = false;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate($id = null)
    {
        $model = new StockItem();
        $model_bakeryCost = new BakeryCost();

        if ($model->load(Yii::$app->request->post(), 'StockItem') && $model->validate())
        {
            if ($model->save(false))
            {
                $model_bakeryCost->attributes = Yii::$app->request->post('BakeryCost');
                $model_bakeryCost->baked_good_id = $model->id;
                $model_bakeryCost->save();

                $ingredients = Yii::$app->request->post('BakeryIngredient');
                
                if ( !empty($ingredients) )
                {
                    foreach ($ingredients as $ingredient)
                    {
                        $ingredient_model = new BakeryIngredient();
                        $ingredient_model->attributes = $ingredient;
                        $ingredient_model->baked_good_id = $model->id;
                        $ingredient_model->save();
                    }
                }
            }

            return $this->redirect(['update', 'id' => $model->id]);
        }

        if (!empty($id))
        {
            // $model->isCopyRecord = true;

            $copyModel = $this->findModel($id);
            $model->attributes = $copyModel->attributes;

            // foreach $model->ingredients as $ingredient
        }

        $model->item_type = 'Baked Good';
        $model->is_stock_item = true;
        $model->stock_uom = 'Kg';
        $model->weight_uom = 'Kg';
        
        $model->is_sales_item = true;
        $model->min_order_qty = 1;

        return $this->render('create', [
            'model' => $model,
            'bakeryCost' => $model_bakeryCost
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_bakeryCost = BakeryCost::findOne(['baked_good_id' => $model->id]);

        if (is_null($model_bakeryCost))
             $model_bakeryCost = new BakeryCost();

        if ($model->load(Yii::$app->request->post(), 'StockItem') && $model->validate())
        {
            if ($model->save(false))
            {
                $model_bakeryCost->attributes = Yii::$app->request->post('BakeryCost');
                $model_bakeryCost->baked_good_id = $model->id;
                $model_bakeryCost->save();
                
                $ingredients = Yii::$app->request->post('BakeryIngredient');

                if ( !empty($ingredients) )
                {
                    foreach ($ingredients as $ingredient)
                    {
                        if (empty($ingredient['id']))
                            $ingredient_model = new BakeryIngredient();
                        else
                            $ingredient_model = BakeryIngredient::findOne($ingredient['id']);
                        
                        $ingredient_model->attributes = $ingredient;
                        $ingredient_model->baked_good_id = $model->id;
                        
                        $ingredient_model->save();
                    }
                }
            }
        }
        
        $this->model = $model;

        return $this->render('update', [
            'model' => $model,
            'bakeryCost' => $model_bakeryCost
        ]);
    }
}
