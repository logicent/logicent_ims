<?php

$columns = [
    [
        'attribute' => 'stockItem.name',
        'label' => 'Baked Good',
        'value' => function ( $model )
        {
            return $model->stockItem->name;
        }
    ],
    [
        'attribute' => 'ingredient.name',
        'label' => 'Ingredient',
        'value' => function ( $model )
        {
            return $model->ingredient->name;
        }
    ],
    'qty_required',
];

$controller = $this->context->id;

echo $this->render('//_list/GridView', [
    'hideId'        => true,
    'columns'       => $columns,
    'dataProvider'  => $dataProvider,
    'context_id'    => $controller . '/',
    'listTitle'     => $this->context->resourceName
]) ?>