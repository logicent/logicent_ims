<?php

use yii\helpers\Html;

$columns = [
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

echo $this->render('/layouts/_view/_gridView', [
                            'dataProvider' => $dataProvider, 
                            'searchModel' => $searchModel,
                            'columns' => $columns
                        ]);
