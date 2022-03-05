<?php

use yii\helpers\Html;

$columns = [
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

echo $this->render('/layouts/_view/_gridView', [
                            'dataProvider' => $dataProvider, 
                            'searchModel' => $searchModel,
                            'columns' => $columns
                        ]);