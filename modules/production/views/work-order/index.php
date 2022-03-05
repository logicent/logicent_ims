<?php

use yii\helpers\Html;

$columns = [
    [
        'attribute' => 'id',
        'label' => 'Work Order',
        'format' => 'raw',
        'value' => function ( $model ) {
            return Html::a($model->id, ['read', 'id' => $model->id]);
        }
    ],
    'doc_status:text:Status',
    // 'reference',
    'batch_no',
    'issue_date:date',
    // 'production_date:date',
    //'shelf_life',
    //'authorized_by',
];

echo $this->render('/layouts/_view/_gridView', [
                            'dataProvider' => $dataProvider, 
                            'searchModel' => $searchModel,
                            'columns' => $columns
                        ]);