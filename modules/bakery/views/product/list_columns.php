<?php

use app\models\StockItemGroup;
use yii\helpers\ArrayHelper;

$columns = [
    'qty_in_stock',
    [
        'attribute' => 'itemGroup.name',
        'label' => 'Item Group',
        'format' => 'raw',
        'value' => function ( $model ) {
            if (!empty($model->item_group))
                return $model->itemGroup->name;
        },
        'filter' => ArrayHelper::merge(['-1' => 'All'], 
                        ArrayHelper::map(StockItemGroup::getListOptions('Baked Good'), 'name', 'name'))
    ],
    [
        'attribute' => 'disabled',
        // 'label' => 'Status',
        'value' => function ( $model ) {
            return Yii::$app->formatter->asBoolean($model->disabled);
        },
        'filter' => ['-1' => 'All', '1' => 'Yes', '0' => 'No']
    ]
];

echo $this->context->renderPartial('/_list/GridView', [
                                    'dataProvider' => $dataProvider, 
                                    'searchModel' => $searchModel,
                                    'columns' => $columns,
                                    'linkAttribute' => 'name'
]);