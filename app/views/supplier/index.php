<?php

$columns = [
    [
        'attribute' => 'supplier_type',
        'filter' => ['-1' => 'All'] // To-Do use SelectableItems with addFilterOptionAll
    ],
];

echo $this->render('/_list/GridView', [
                    'dataProvider' => $dataProvider, 
                    'searchModel' => $searchModel,
                    'columns' => $columns,
                    'linkAttribute' => 'name'
                ]);
