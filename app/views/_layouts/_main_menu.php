<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>
<?= Html::a(Elements::icon('brown money large') . Yii::t('app', 'Accounts'),
            ['/accounts'], ['class' => 'item']) ?>
<?= Html::a(Elements::icon('grey tags large') . Yii::t('app', 'Sales'),
            ['/sales'], ['class' => 'item']) ?>
<?= Html::a(Elements::icon('grey shopping basket large') . Yii::t('app', 'POS'),
            ['/pos'], ['class' => 'item']) ?>
<?= Html::a(Elements::icon('grey options large') . Yii::t('app', 'Customize'),
            ['/customize'], ['class' => 'item']) ?>
<?= Html::a(Elements::icon('grey industry large') . Yii::t('app', 'Bakery'),
            ['/bakery'], ['class' => 'item']) ?>
<?= Html::a(Elements::icon('grey sitemap large') . Yii::t('app', 'Website'),
            ['/website'], ['class' => 'item']) ?>
<?= Html::a(Elements::icon('grey tag large') . Yii::t('app', 'Purchase'),
            ['/purchase'], ['class' => 'item']) ?>
<?= Html::a(Elements::icon('grey address book outline large') . Yii::t('app', 'HR'),
            ['/hr'], ['class' => 'item']) ?>
<?= Html::a(Elements::icon('grey shipping large') . Yii::t('app', 'Fleet'),
            ['/fleet'], ['class' => 'item']) ?>
<?= Html::a(Elements::icon('grey cubes large') . Yii::t('app', 'Stock'),
            ['/stock'], ['class' => 'item']) ?>
<?= Html::a(Elements::icon('grey industry large') . Yii::t('app', 'Production'),
            ['/production'], ['class' => 'item']) ?>