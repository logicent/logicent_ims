<?php

use app\enums\Type_Supplier;
use yii\helpers\Html;

$columns = [
    [
        'attribute' => 'supplier_type',
        'value' => function($model) {
            return Type_Supplier::enums()[$model->supplier_type];
        },
        'filter' => ['-1' => 'All']
    ],
];

echo $this->render('/_list/GridView', [
                    'dataProvider' => $dataProvider, 
                    'searchModel' => $searchModel,
                    'columns' => $columns,
                    'linkAttribute' => 'name'
                ]);
