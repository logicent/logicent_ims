<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

$sumOrderTotal = $model->getSalesOrder()->sum('total_amount');
$sumInvoiceTotal = $model->getSalesInvoice()->sum('total_amount');

if ($sumOrderTotal > 0)
    $sumOrderTotal = Yii::$app->formatter->asCurrency($sumOrderTotal);

if ($sumInvoiceTotal > 0)
    $sumInvoiceTotal = Yii::$app->formatter->asCurrency($sumInvoiceTotal);
?>

<div class="ui secondary top attached padded segment">
    <div class="two fields linked-data">
        <div class="field item">
            <?= Html::a(Yii::t('app', 'Sales Order') . '&ensp;' .
                    Elements::Label($model->getSalesOrder()->count(), ['class' => 'basic']), 
                    ['sales-order/index', 'SalesOrderSearch' => ['customer_name' => $model->name]]
                ) ?>
        </div>
        <div class="field item">
            <?= Html::a(Yii::t('app', 'Sales Invoice') . '&ensp;' .
                    Elements::Label($model->getSalesInvoice()->count(), ['class' => 'basic']),
                    ['sales-invoice/index', 'SalesInvoiceSearch' => ['customer_name' => $model->name]]
                ) ?>
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
