<?php

use yii\helpers\Html;

$columns = [
    [
        'attribute' => 'full_name',
        'format' => 'raw',
        'value' => function ( $model ) {
            return Html::a($model->full_name, ['update', 'id' => $model->id]);
        }
    ],
    // 'emp_type',
    //'identity_card',
    'status',
    //'personal_email:email',
    //'company_email:email',
    // 'mobile',
    'designation',
    //'sex',
    [
        'attribute' => 'emp_code',
        'label' => false,
        'format' => 'raw',
        'value' => function ( $model ) {
            return Html::tag('span', $model->emp_code, ['class' => 'text-muted']);
        },
        'filter' => false,
    ],
];

echo $this->render('/layouts/_view/_gridView', [
                            'dataProvider' => $dataProvider, 
                            'searchModel' => $searchModel,
                            'columns' => $columns
                        ]);