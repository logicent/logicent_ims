<?php

use yii\helpers\Html;

return [
    [
        'attribute' => 'license_plate',
        'format' => 'raw',
        'value' => function ( $model ) {
            return Html::a($model->license_plate, ['update', 'id' => $model->id]);
        }
    ],
    'doc_status:text:Status',
    // 'acquisition_date',
    'make',
    'model',
    'employee',
    //'color',
];