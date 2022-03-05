<?php

use yii\helpers\Html;

return [
    [
        'attribute' => 'posting_date',
        'value' => function ( $model ) {
            return Yii::$app->formatter->asDate($model->posting_date);
        },
        'filterInputOptions' => [
            'class' => 'pikaday'
        ]
    ],
    [
        'attribute' => 'total_amount',
        'format' => 'raw',
        'headerOptions' => ['class' => 'right aligned'],
        'value' => function( $model ) {
            return Html::tag('div', 'Ksh. ' . Yii::$app->formatter->asDecimal($model->total_amount), 
                            ['class' => 'text-muted']);
        },
        'contentOptions' => ['class' => 'right aligned']
    ]
];