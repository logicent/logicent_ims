<?php

use yii\helpers\Html;

return [
    [
        'attribute' => 'stock_item_id',
        'format' => 'raw',
        'value' => function ( $model ) {
            return Html::a($model->stockItem->name, ['update', 'id' => $model->id]);
            }
    ],
    [
        'attribute' => 'price_list_id',
        'format' => 'raw',
        'value' => function ( $model ) {
                return $model->priceList->name;
        }
    ],
    'price_list_rate',
    'currency',
];