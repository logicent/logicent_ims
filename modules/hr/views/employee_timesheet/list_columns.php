<?php

use yii\helpers\Html;

return [
    [
        'attribute' => 'employee_name',
        'format' => 'raw',
        'value' => function ( $model ) {
            return Html::a($model->employee->full_name, ['update', 'id' => $model->id]);
        }
    ],
    'total_working_hours',
    'total_billable_hours',
    'total_billable_amount',
    //'total_costing_amount',
    //'status',
];