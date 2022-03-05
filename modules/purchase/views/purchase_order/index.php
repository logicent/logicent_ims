<?php

$columns = require Yii::getAlias('@system_modules') . '//accounts/views/_list/_doc_columns.php';

echo $this->render('//_list/GridView', [
                    'dataProvider' => $dataProvider, 
                    'searchModel' => $searchModel,
                    'columns' => $columns,
                    'linkAttribute' => 'supplier_name'
                ]);