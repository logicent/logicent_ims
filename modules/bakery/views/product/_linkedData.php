<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

$sum_quote_amount = $model->getSalesQuoteItem()->sum('total_amount');
$sum_order_amount = $model->getSalesOrderItem()->sum('total_amount');

if ($sum_quote_amount > 0)
    $sum_quote_amount = "<div class='detail'>" . Yii::$app->formatter->asCurrency($sum_quote_amount) . "</div>";

if ($sum_order_amount > 0)
    $sum_order_amount = "<div class='detail'>" . Yii::$app->formatter->asCurrency($sum_order_amount) . "</div>";
?>

<div class="ui secondary attached segment">
    <div class="ui small two column grid link list">
        <div class="column item">
            <?= Html::a(Yii::t('app', 'Sales Quote') . 
                    "&ensp;
                    <div class='ui label'>{$model->getSalesQuoteItem()->count()}{$sum_quote_amount}</div>", 
                    ['sales/sales-quote/index', 'SalesQuoteItemSearch' => ['item.name' => $model->name]
                    ]) . "&emsp;" .
                Html::a(Elements::icon('plus square outline', ['class' => 'large']), 
                    ['sales/sales-quote/create', 'item_id' => $model->id], ['title' => 'New Sales Quote']) ?>
        </div>
        <div class="column item">
            <?= Html::a(Yii::t('app', 'Sales Order') . 
                    "&ensp;
                    <div class='ui label'>{$model->getSalesOrderItem()->count()}{$sum_order_amount}</div>", 
                    ['sales/sales-order-item/index', 'SalesOrderItemSearch' => ['stockItem.name' => $model->name]
                    ]) . "&emsp;" .
                Html::a(Elements::icon('plus square outline', ['class' => 'large']), 
                    ['sales/sales-order/create', 'item_id' => $model->id], ['title' => 'New Sales Order']) ?>
        </div>
    </div>
</div>

<?php /* = Menu::widget([
    'vertical' => true,
    'items' => [
        // [
        //     'label' => Elements::input(\yii\helpers\Html::input('text', null, null, ['placeholder' => 'search'])),
        //     'encode' => false
        // ],
        [
            'label' => 'Sales Order' . Elements::label('7'),
            'url' => ['/sales/sales-order'],
            'encode' => false
        ],
    ]
]); */ ?>
