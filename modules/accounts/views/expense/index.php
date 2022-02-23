<?php

use yii\helpers\Html;

$columns = [
    'date:date',
    [
        'attribute' => 'amount',
        'format' => 'decimal',
        'headerOptions' => [
            'class' => 'right aligned'
        ],
        'contentOptions' => [
            'class' => 'right aligned'
        ]
     ],
    // 'reference',
    // 'payment_method',
];


echo $this->render('//_list/GridView', [
    'dataProvider' => $dataProvider, 
    'searchModel' => $searchModel,
    'columns' => $columns,
]);
