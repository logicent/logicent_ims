<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>

<div class="ui dropdown item">
    <?= Elements::icon('grey plus square outline large') ?>
    <span class="text"><?= Yii::t('app', 'Create') ?></span>&ensp;
    <?= Elements::icon('down small chevron') ?>

    <div class="menu">
        <?= Html::a(Elements::icon('grey shopping basket') . Yii::t('app', 'Sales Invoice'),
                    ['/accounts/sales-invoice/create'], ['class' => 'item']) ?>
        <?= Html::a(Elements::icon('grey money') . Yii::t('app', 'Expense'),
                    ['/accounts/expense/create'], ['class' => 'item']) ?>
        <?= Html::a(Elements::icon('grey horizontal flipped truck') . Yii::t('app', 'Purchase Invoice'),
                    ['/accounts/purchase-invoice/create'], ['class' => 'item']) ?>
        <?= Html::tag('div', null, ['class' => 'divider', 'style' => 'margin: 0']) ?>
        <?= Html::a(Elements::icon('grey book') . Yii::t('app', 'Stock Entry'),
                    ['/stock/stock-entry/create'], ['class' => 'item']) ?>
    </div>
</div>&ensp;