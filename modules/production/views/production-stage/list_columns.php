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
    'is_active:boolean',
];

echo $this->render('/layouts/_view/_gridView', [
                            'dataProvider' => $dataProvider, 
                            'searchModel' => $searchModel,
                            'columns' => $columns
                        ]);