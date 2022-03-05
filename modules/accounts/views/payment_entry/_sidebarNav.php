<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\sales\SalesOrder;

use app\assets\ChartjsAsset;

ChartjsAsset::register($this);
?>

<div class="ui vertical segment">
    <div class="ui vertical text menu">

        <div class="item">
            
        </div>

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

    // $this->registerJs($this->render('_chart.js'));
?>