<?php

$this->title = Yii::t('app', 'HR');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'HR'), 'url' => ['index']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('@app_main/views/_layouts/_menu_in_page', ['menuList' => $menuList]);