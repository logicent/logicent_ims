<?php

$columns = [
    'branch',
];

$controller = $this->context->id;

echo $this->render('/setup/_list/GridView', [
    'hideId'        => false,
    'columns'       => $columns,
    'dataProvider'  => $dataProvider,
    'context_id'    => $controller . '/',
    'listTitle'     => $this->context->resourceName
]) ?>