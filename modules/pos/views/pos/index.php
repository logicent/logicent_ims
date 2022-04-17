<?php

$this->title = Yii::t('app', 'POS');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'POS'), 'url' => ['/pos']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('@app_main/views/_layouts/_menu_in_page', ['menuList' => $menuList])
?>