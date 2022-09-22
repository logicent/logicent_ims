<?php

use crudle\ext\stock\models\ItemGroup;
use yii\helpers\ArrayHelper;

return [
    'qty_in_stock',
    [
        'attribute' => 'item_group',
        'label' => 'Item Group',
        'format' => 'raw',
        'value' => function ( $model ) {
            if (!empty($model->item_group))
                return $model->itemGroup->id;
        },
        'filter' => ArrayHelper::merge(['-1' => 'All'],
                        ArrayHelper::map(
                            ItemGroup::find()->select(['id'])->asArray()->all(), 
                            'id', 'id'
                        )
                    )
    ],
];