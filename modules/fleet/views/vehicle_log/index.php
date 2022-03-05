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
    'reference',
    //'fuel_qty',
    //'make',
    'odometer',
    //'employee',
    //'price',
    // 'supplier',
    //'date',
    //'model',
];

echo $this->render('/layouts/_view/_gridView', [
                            'dataProvider' => $dataProvider, 
                            'searchModel' => $searchModel,
                            'columns' => $columns
                        ]);
