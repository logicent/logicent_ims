<?php

use yii\helpers\Html;

$columns = [
    'is_default:boolean',
];

$controller = $this->context->id;

echo $this->render('@setup/views/setup/_list/GridView', [
    'hideId'        => false,
    'columns'       => $columns,
    'dataProvider'  => $dataProvider,
    'context_id'    => $controller . '/',
    'listTitle'     => $this->context->resourceName
]) ?>