<?php

$this->title = Yii::t('app', 'Stock');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock'), 'url' => ['index']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('@appMain/views/_layouts/_menu_in_page', ['menuList' => $menuList])
?>