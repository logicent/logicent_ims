<?php

use yii\helpers\Html;

$columns = [
    'salary_structure',
    'posting_date',
    'payroll_frequency',
    'start_period',
    'end_period',
];

echo $this->render('/layouts/_view/_gridView', [
                            'dataProvider' => $dataProvider, 
                            'searchModel' => $searchModel,
                            'columns' => $columns
                        ]);