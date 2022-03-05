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
    'start_date',
    'end_date',
    'status',
    //'leave_type',
];

echo $this->render('/layouts/_view/_gridView', [
                            'dataProvider' => $dataProvider, 
                            'searchModel' => $searchModel,
                            'columns' => $columns
                        ]);