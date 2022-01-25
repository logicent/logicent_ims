<?php

use yii\helpers\Html;

$columns = [
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

$controller = $this->context->id;

echo $this->render('/setup/_list/GridView', [
    'hideId'        => true,
    'columns'       => $columns,
    'dataProvider'  => $dataProvider,
    'context_id'    => $controller . '/',
    'listTitle'     => $this->context->resourceName
]) ?>