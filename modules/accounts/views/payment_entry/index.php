<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Payment Entry');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];

$columns = [
    // 'title',
    // 'party',
    'party_name',
    'doc_status',
    // 'reference_no',
    // 'reference_date',
    // 'paid_from',
    // 'paid_to',
    'paid_amount',
    'mode_of_payment',
    'payment_type',
    'posting_date',
];

echo $this->render('//_list/GridView', [
        'dataProvider' => $dataProvider, 
        'searchModel' => $searchModel,
        'columns'       => $columns
    ]);