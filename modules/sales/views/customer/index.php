<?php

use logicent\accounts\enums\Type_Party_Sub_Type;

$columns = [
    [
        'attribute' => 'party_type',
        'value' => function($model) {
            return Type_Party_Sub_Type::enums()[$model->party_type];
        },
        'filter' => array_merge(['-1' => 'All'], Type_Party_Sub_Type::enums())
    ],
];

echo $this->render('///_list/GridView', [
                    'dataProvider' => $dataProvider, 
                    'searchModel' => $searchModel,
                    'columns' => $columns,
                ]);
