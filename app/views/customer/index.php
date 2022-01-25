<?php

use app\enums\Status_Party;
use app\enums\Type_Customer;
use app\helpers\StatusMarker;

$columns = [
    [
        'attribute' => 'customer_type',
        'value' => function($model) {
            return Type_Customer::enums()[$model->customer_type];
        },
        'filter' => ['-1' => 'All', 'Individual' => 'Individual', 'Company' => 'Company', 'Non-profit' => 'Non-profit']
    ],
];

echo $this->render('/_list/GridView', [
                    'dataProvider' => $dataProvider, 
                    'searchModel' => $searchModel,
                    'columns' => $columns,
                ]);
