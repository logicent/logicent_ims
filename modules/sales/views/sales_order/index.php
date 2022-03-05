<?php

$this->title = Yii::t('app', 'Sales Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales'), 'url' => ['/sales']];

$columns = require Yii::getAlias('@system_modules') . '//accounts/views/_list/_doc_columns.php';

echo $this->render('//_list/GridView', [
        'dataProvider' => $dataProvider,
        'searchModel' => $searchModel,
        'columns' => $columns,
        'linkAttribute' => 'customer_name'
    ]);