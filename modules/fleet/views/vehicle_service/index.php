<?php

use yii\helpers\Html;

$columns = [
    [
        'attribute' => 'license_plate',
        'format' => 'raw',
        'value' => function ( $model ) {
            return Html::a($model->vehicle->license_plate, ['update', 'id' => $model->id]);
        }
    ],
    'doc_status:text:Status',    
    // 'service_item',
    'type',
    // 'frequency',
    'expense_amount',
];

echo $this->render('/layouts/_view/_gridView', [
                            'dataProvider' => $dataProvider, 
                            'searchModel' => $searchModel,
                            'columns' => $columns
                        ]);
