<?php

use yii\helpers\Html;

$columns = [
    [
        'attribute' => 'name',
        'format' => 'raw',
        'value' => function ( $model ) {
            return Html::a($model->name, ['read', 'id' => $model->id]);
        }
    ],
    'doc_status',
    'item_made',
    'mfg_date'
];

echo $this->render('/layouts/_view/_gridView', [
                            'dataProvider' => $dataProvider, 
                            'searchModel' => $searchModel,
                            'columns' => $columns
                        ]);