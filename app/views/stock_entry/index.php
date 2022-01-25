<?php

use yii\helpers\Html;

// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock'), 'url' => ['modules/catalog', 'id' => 'stock']];

$columns = [
    'doc_status',
    //'posting_time',
    'from_warehouse',
    'to_warehouse',
    'total_incoming_value',
    'total_outgoing_value',
    //'remarks:ntext',
    //'title',
    //'posting_date',
    //'purpose',
];

echo $this->render('/layouts/_view/_gridView', [
                            'dataProvider' => $dataProvider, 
                            'searchModel' => $searchModel,
                            'columns' => $columns
                        ]);