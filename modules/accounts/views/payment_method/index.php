<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Payment Method');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['/accounts']];

$columns = [
    'is_default:boolean',
];

$controller = $this->context->id;

echo $this->render('//_list/GridView', [
        'dataProvider' => $dataProvider, 
        'searchModel' => $searchModel,
        'columns'       => $columns
    ]);