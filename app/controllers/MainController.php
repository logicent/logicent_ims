<?php

namespace app\controllers;

use app\models\Expense;
use app\models\PurchaseInvoice;
use app\models\SalesInvoice;
use yii\filters\AccessControl;

class MainController extends \app\controllers\base\BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'user-manual', 'about', 'support-ticket'],
                'rules' => [
                    [
                        'actions' => ['index', 'user-manual', 'about', 'support-ticket'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        $stats = [];
        $totalSales = SalesInvoice::find()
                        ->where(['like', 'posting_date', date('Y-m-d')])
                        ->sum('total_amount');
        $stats['totalSales'] = empty($totalSales) ? 0 : $totalSales;
        // add sales this month

        $totalPurchases = PurchaseInvoice::find()
                            ->where(['like', 'issued_at', date('Y-m-d')])
                            ->sum('total_amount');
        $stats['totalPurchases'] = empty($totalPurchases) ? 0 : $totalPurchases;
        // add purchases this month

        $totalExpenses = Expense::find()
                            ->where(['date' => date('Y-m-d')])
                            ->sum('amount');
        $stats['totalExpenses'] = empty($totalExpenses) ? 0 : $totalExpenses;
        // add expenses this month

        $stats['grossProfit'] = $stats['totalSales'] - $stats['totalPurchases'];
        $stats['netProfit'] = $stats['grossProfit'] - $stats['totalExpenses'];

        // add profits this month

        return $this->render('index', [
            'stats' => $stats
        ]);
    }

    public function actionUserManual()
    {
        return $this->render('help');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
