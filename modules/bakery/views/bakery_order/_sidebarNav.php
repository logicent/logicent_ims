<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\SalesOrder;
use app\models\SalesOrderItem;
use app\models\StockItem;
use Zelenin\yii\SemanticUI\Elements;

use app\assets\ChartjsAsset;

ChartjsAsset::register($this);
?>

<div class="ui vertical segment">
    <div class="ui vertical text menu">
        <?= Html::a('Daily Work Summary', ['bakery-order/daily-work-summary'], ['class' => 'item']) ?>
        <?= Html::a('Staff-wise Order Summary', ['bakery-order/staff-wise-order-summary'], ['class' => 'item']) ?>

        <div class="ui small header">
            Most Ordered
        </div>
    <?php
        // default filter is Today
        // add a dropdown for This week, This month, Yesterday, Last week, Last month
        $topOrders = SalesOrderItem::find()->select(['item_id', 'COUNT(item_id) as order_count'])
                                            ->groupBy('item_id')
                                            ->orderBy('order_count DESC')
                                            ->asArray()
                                            ->limit(5)
                                            ->all();
        foreach($topOrders as $topOrder) :
            $item = StockItem::findOne($topOrder['item_id']);

            echo Html::tag('div', 
                    Html::a($item->name . Elements::label($topOrder['order_count'], ['class' => 'mini circular']), 
                            ['index', 'SalesOrderItemSearch' => ['stockItem.name' => $item->name]], ['class' => 'item'])
                );
            // break;
        endforeach
        ?>
    </div>
</div>

<?php
    // $params = [
    //     'chart' => 'doughnut',
    //     'title' => 'SalesOrder Payments',
    //     'data' => [
    //         SalesOrder::find()->where(['payment_status' => SalesOrder::PAYMENT_STATUS_NOT_PAID])->count(),
    //         SalesOrder::find()->where(['payment_status' => SalesOrder::PAYMENT_STATUS_PARTLY_PAID])->count(),
    //         SalesOrder::find()->where(['payment_status' => SalesOrder::PAYMENT_STATUS_FULLY_PAID])->count()
    //     ],
    //     'labels' => [
    //         SalesOrder::PAYMENT_STATUS_NOT_PAID,
    //         SalesOrder::PAYMENT_STATUS_PARTLY_PAID,
    //         SalesOrder::PAYMENT_STATUS_FULLY_PAID,
    //     ],
    //     'background_color' => [
    //         '#F2711C',
    //         '#2185D0',
    //         '#21BA45',
    //     ],
    // ];

    // $this->registerJs(
    //     "var chart_properties = "  .\yii\helpers\Json::htmlEncode($params) . ";",
    //     $this::POS_HEAD
    // );

    // $this->registerJs($this->context->renderPartial('_chart.js'));
?>