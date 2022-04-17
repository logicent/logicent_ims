<?php

use app\helpers\StatusMarker;
use yii\helpers\Html;
use app\models\StockItem;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bakery'), 'url' => ['/bakery']];

$columns = [
    [
        'attribute' => 'salesDoc.delivery_at',
        'format' => 'raw',
        'value' => function ( $model ) {
            return Yii::$app->formatter->asDateTime($model->salesDoc->delivery_at, 'dd-MM-YY, hh:mm a') .
                    Html::tag('div', $model->salesDoc->delivery_type, ['class' => 'text-muted']);
        },
        'filterInputOptions' => [
            'class' => 'pikaday'
        ]
    ],
    [
        'attribute' => 'bake_status',
        'format' => 'raw',
        'value' => function ($model, $key, $index, $column) {
            return
                StatusMarker::icon('check circle', $model, $column->attribute) . '&nbsp;' . $model->bake_status .
                Html::tag('div', !is_null($model->cakeBakedBy) ? $model->cakeBakedBy->description : '',
                        ['class' => 'text-muted']);
        },
        // Add Delivered or Collected if needed
        'filter' => ['-1' => 'All', 'Finished' => 'Finished', 'In Progress' => 'In Progress', 'Not Started' => 'Not Started']
    ],
    [
        'attribute' => 'deco_status',
        'format' => 'raw',
        'value' => function ($model, $key, $index, $column) {
            return
                StatusMarker::icon('check circle', $model, $column->attribute) . '&nbsp;' . $model->deco_status .
                Html::tag('div', !is_null($model->cakeDecoratedBy) ? $model->cakeDecoratedBy->description : '',
                        ['class' => 'text-muted']);
        },
        // Add Delivered or Collected if needed
        'filter' => ['-1' => 'All', 'Finished' => 'Finished', 'In Progress' => 'In Progress', 'Not Started' => 'Not Started']
    ],
    [
        'attribute' => 'customer',
        'format' => 'raw',
        'value' => function ( $model ) {
            // <span class="happy font">
            return 
                // Html::a($model->salesDoc->customer_name, [
                //         'sales/customer/view', 'id' => $model->salesDoc->customer->id]) .
                Html::tag('div', $model->salesDoc->customer_name, ['class' => 'ui sub header']) . 
                Html::tag('div', $model->salesDoc->customer->phone_number, ['class' => 'text-muted']);
        },
    ],
    // Add column of Duration to delivery (countdown) with refresh every 3 min or 5 min
    // ... use window.location.reload every so long with pjax in grid

    // [
    //     'attribute' => 'sales_order_id',
    //     'format' => 'raw',
    //     'value' => function( $model ) {
    //         return Html::a(Html::tag('span', Html::encode(str_pad($model->sales_order_id, 5, '0', STR_PAD_LEFT)), 
    //                                 ['class' => 'text-muted']),
    //                     ['/sales/sales-order/view', 'id' => $model->id]);
    //     },
    // ],
];

echo $this->context->renderPartial('//_list/GridView', [
        'dataProvider' => $dataProvider, 
        'searchModel' => $searchModel,
        'columns' => $columns,
        // 'linkAttribute' => 'stockItem.name'
    ]);