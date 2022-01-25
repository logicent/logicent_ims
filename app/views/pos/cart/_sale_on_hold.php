<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\modules\Radio;

$this->title = Yii::t('app', 'Sales On Hold');

?>
<div class="text-muted ui secondary centered segment header" style="font-weight: 500"><?= $this->title ?></div>
<table class="ui table">
    <thead>
        <tr>
            <th></th>
            <th class="text-muted"><?= Yii::t('app', 'Customer') ?></th>
            <th class="text-muted"><?= Yii::t('app', 'Issue date') ?></th>
            <th class="text-muted right aligned"><?= Yii::t('app', 'Total amount') ?></th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach ($sales as $sale) : ?>
        <tr>
            <td width="5%"><?= Radio::widget(['class' => 'select-row', 'name' => '__on_hold_sale']) ?></td>
            <td><?= Html::a($sale->customer_name, ['index', 'id' => $sale->id], ['class' => 'ui link']) ?></td>
            <td><?= Yii::$app->formatter->asDatetime($sale->issued_at) ?></td>
            <td class="right aligned"><?= Yii::$app->formatter->asCurrency($sale->total_amount, 'KES') ?></td>
        </tr>
<?php
    endforeach ?>
        </tbody>
    </table>
    <?= Html::a(Yii::t('app', 'Continue Sale'), ['index'], [
            'class' => 'compact ui primary button'
        ]) ?>
