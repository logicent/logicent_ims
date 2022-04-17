<?php

use app\models\StockItemGroup;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$columns = [
        [
            'attribute' => 'name',
            'format' => 'raw',
            'value' => function ( $model ) {
                return Html::a($model->name, ['update', 'id' => $model->id]);
            }
        ],
        'qty_in_stock',
        'qty_reserved',
        [
            'attribute' => 'itemGroup.name',
            'label' => 'Item Group',
            'format' => 'raw',
            'value' => function ( $model ) {
                if (!empty($model->item_group))
                    return $model->itemGroup->name;
            },
            'filter' => ArrayHelper::merge(['-1' => 'All'], 
                            ArrayHelper::map(StockItemGroup::getListOptions('Ingredient'), 'name', 'name'))
        ],
        [
            'attribute' => 'disabled',
            // 'label' => 'Status',
            'value' => function ( $model ) {
                return Yii::$app->formatter->asBoolean($model->disabled);
            },
            'filter' => ['-1' => 'All', '1' => 'Yes', '0' => 'No']
        ],
];

$controller = $this->context->id;

echo $this->render('//_list/GridView', [
    'hideId'        => true,
    'columns'       => $columns,
    'dataProvider'  => $dataProvider,
    'context_id'    => $controller . '/',
    'listTitle'     => $this->context->resourceName
]) ?>