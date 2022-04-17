<?php

use logicent\accounts\enums\Type_Party_Sub_Type;

return [
    [
        'attribute' => 'party_group',
        'value' => function($model) {
            return Type_Party_Sub_Type::enums()[$model->party_group];
        },
        'filter' => array_merge(['-1' => 'All'], Type_Party_Sub_Type::enums())
    ],
];