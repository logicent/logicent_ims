<?php

use yii\helpers\Html;

$columns = [
    'customer_id',
    'docStatusLabel',
    'reference',
    'posting_date',
    // 'sales_order_id'
];

echo $this->render('/layouts/_view/_gridView', [
                            'dataProvider' => $dataProvider, 
                            'searchModel' => $searchModel,
                            'columns' => $columns
                        ]);