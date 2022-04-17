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
    'type',
];