<?php

namespace app\controllers;

use app\controllers\base\BaseCrudController;
use app\models\BakeryOrder;
use app\models\BakeryOrderSearch;
use Yii;
use app\models\StockItem;
use app\models\SalesOrderItem;
use yii\data\ArrayDataProvider;

class BakeryOrderController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = BakeryOrder::class;
        $this->modelSearchClass = BakeryOrderSearch::class;

        return parent::init();
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            $model->save();
            // check if deco is required for this cake
            if ($model->bake_status == 'Finished' && $model->deco_status == 'Finished')
            {
                // deduct qty_reserved for all ingredients used
                if ($model->salesDoc->is_combined) 
                {
                    $items = explode(',', $model->item_id);
                    foreach ($items as $item) 
                    {
                        $makeItem = StockItem::findOne((int) $item);
                        foreach ($makeItem->ingredients as $ingredient)
                        {
                            $usedItem = StockItem::findOne($ingredient->ingredient_id);
                            $usedItem->qty_reserved -= $ingredient->qty_required;
                            $usedItem->save();
                        }
                        // add qty_in_stock for order item made
                        $makeItem->qty_in_stock += $model->qty;
                        $makeItem->save();                        
                    }
                }
                else
                {
                    foreach ($model->stockItem->ingredients as $ingredient)
                    {
                        $usedItem = StockItem::findOne($ingredient->ingredient_id);
                        $usedItem->qty_reserved -= $ingredient->qty_required;
                        $usedItem->save();
                    }
                    // add qty_in_stock for order item made
                    $model->stockItem->qty_in_stock += $model->qty;
                    $model->stockItem->save();
                }

                $model->salesDoc->doc_status = 'Completed';
                $model->salesDoc->save();
            }

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionStaffWiseOrderSummary($staff = null)
    {
        $this->sidebar = false;
        
        $search = \app\models\Person::find();

        if (!empty($staff))
            $employees = $search->andWhere(['auth_id' => $staff]);
        
        $employees = $search->orderBy('firstname, surname')->all();
        
        $empStats = [];

        foreach ($employees as $employee)
        {
            $cakesBaked = SalesOrderItem::find()
                                        ->select(['delivery_at'])
                                        ->where(['bake_status' => 'Finished', 'baked_by' => $employee->auth_id])
                                        ->all();
            $cakesDecorated = SalesOrderItem::find()
                                        ->where(['deco_status' => 'Finished', 'decorated_by' => $employee->auth_id])
                                        ->all();
            // if (empty($cakesBaked))
            //     continue;

            $empStat = [
                'employee' => $employee->description,
                // 'date_of_month' => Yii::$app->formatter->asDate($cakesBaked->delivery_at),
                'baked_units' => count($cakesBaked),
                'bake_rate' => '',
                'decorated_units' => count($cakesDecorated),
                'deco_rate' => '',
                'total_earned' => '',
            ];

            $empStats[] = $empStat;
        }

        $provider = new ArrayDataProvider([
            'allModels' => $empStats,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['date_of_month', 'employee'],
            ],
        ]);

        return $this->render('summary-index', [
            'dataProvider' => $provider
        ]);
    }

    public function actionDailyWorkSummary($date = null)
    {
        $this->sidebar = false;
        
        if (empty($date))
            $date = date('Y-m-d');
        
        $employees = \app\models\Person::find()->orderBy('firstname, surname')->all();;

        $empStats = [];

        foreach ($employees as $employee)
        {
            $countBaked = SalesOrderItem::find()
                                        ->where(['bake_status' => 'Finished', 'baked_by' => $employee->auth_id])
                                        ->andWhere(['like', 'delivery_at', $date])
                                        ->count();
            $countDecorated = SalesOrderItem::find()
                                        ->where(['deco_status' => 'Finished', 'decorated_by' => $employee->auth_id])
                                        ->andWhere(['like', 'delivery_at', $date])
                                        ->count();
            $empStat = [
                'employee' => $employee->description,
                'date_of_month' => Yii::$app->formatter->asDate($date),
                'baked_units' => $countBaked,
                'bake_rate' => '',
                'decorated_units' => $countDecorated,
                'deco_rate' => '',
                'total_earned' => '',
            ];

            $empStats[] = $empStat;
        }

        $provider = new ArrayDataProvider([
            'allModels' => $empStats,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['date_of_month', 'employee'],
            ],
        ]);

        return $this->render('summary-index', [
            'dataProvider' => $provider
        ]);
    }
}
