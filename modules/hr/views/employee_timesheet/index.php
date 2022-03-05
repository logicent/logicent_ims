<?php

use yii\helpers\Html;

$columns = [
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

echo $this->render('/layouts/_view/_gridView', [
                            'dataProvider' => $dataProvider, 
                            'searchModel' => $searchModel,
                            'columns' => $columns
                        ]);