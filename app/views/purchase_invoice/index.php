<?php

$columns = require Yii::getAlias('@app/views') . '/_list/_doc_columns.php';

echo $this->render('/_list/GridView', [
                    'dataProvider' => $dataProvider, 
                    'searchModel' => $searchModel,
                    'columns' => $columns,
                    'linkAttribute' => 'supplier_name'
                ]);