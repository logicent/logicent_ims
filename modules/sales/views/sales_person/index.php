<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Sales Person');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales'), 'url' => ['/sales']];

$columns = [
];

$controller = $this->context->id;

echo $this->render('//_list/GridView', [
        'dataProvider' => $dataProvider, 
        'searchModel' => $searchModel,
        'columns' => $columns,
    ]);
