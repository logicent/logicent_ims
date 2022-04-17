<?php

use yii\helpers\Html;

return [
    [
        'attribute' => 'name',
        'format' => 'raw',
        'value' => function ( $model ) {
            return Html::a($model->name, ['update', 'id' => $model->id]);
        }
    ],
    'code',
    'enabled',
    'is_default',
    //'payroll_frequency',
    //'use_timesheet:datetime',
    //'ts_salary_component',
    //'mode_of_payment',
    //'payment_account',
];