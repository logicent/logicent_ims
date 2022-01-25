<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>

<!-- <div class="ui menu"> -->
    <div class="ui pointing dropdown">
        <?= Elements::icon('grey unordered list large') ?>
        <span class="text"><?= Yii::t('app', 'Menu') ?></span>&ensp;
        <!-- plus square outline -->
        <?= Elements::icon('down small chevron') ?>

        <div class="menu">
            <?= Html::a(Elements::icon('grey shopping basket') .
                        Yii::t('app', 'Sales'), ['sales-invoice/index'], ['class' => 'item']) ?>
            <?= Html::a(Elements::icon('grey money') .
                        Yii::t('app', 'Expenses'), ['expense/index'], ['class' => 'item']) ?>
            <?= Html::a(Elements::icon('grey horizontal flipped truck') .
                        Yii::t('app', 'Purchases'), ['purchase-invoice/index'], ['class' => 'item']) ?>
            <div class="divider" style="margin: 0"></div>
            <?php /*= Html::a(Elements::icon('grey book') .
                        Yii::t('app', 'Stock Entry'), ['stock-entry/index'], ['class' => 'item']) */?>
            <!-- <div class="divider" style="margin: 0"></div> -->
            <?= Html::a(Elements::icon('grey briefcase') .
                        Yii::t('app', 'Suppliers'), ['supplier/index'], ['class' => 'item']) ?>
        </div>
    </div>
<!-- </div> -->