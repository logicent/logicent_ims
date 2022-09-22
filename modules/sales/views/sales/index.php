<?php

$this->title = Yii::t('app', 'Sales');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales'), 'url' => ['index']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('@appMain/views/_layouts/_menu_in_page', ['menuList' => $menuList])
?>