<?php

namespace app\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\main\models\auth\Person;
use logicent\bakery\models\BakeryOrder;
use logicent\bakery\models\BakeryOrderSearch;
use logicent\sales\models\SalesOrderItem;
use Yii;
use yii\data\ArrayDataProvider;

class BakeryOrderController extends BaseCrudController
{
    public function modelClass(): string
    {
        return BakeryOrder::class;
    }

    public function searchModelClass(): string
    {
        return BakeryOrderSearch::class;
    }

    public function actionStaffWiseOrderSummary($staff = null)
    {
        $this->sidebar = false;
        
        $search = Person::find();

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
        
        $employees = Person::find()->orderBy('firstname, surname')->all();;

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
