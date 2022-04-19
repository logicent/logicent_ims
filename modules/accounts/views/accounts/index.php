<?php

$this->title = Yii::t('app', 'Accounts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['index']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('@app_main/views/_layouts/_menu_in_page', ['menuList' => $menuList])
?>