<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\GridView;

$this->title = Yii::t('app', 'Purchase Receipt');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-receipt-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'layout' => "{items}\n{pager}",
        'dataProvider' => $dataProvider,
        'filterPosition' => GridView::FILTER_POS_HEADER,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'Zelenin\yii\SemanticUI\widgets\CheckboxColumn'],
            // ['class' => 'yii\grid\SerialColumn'],

            'doc_status',
            'parent_id',
            'parent_field',
            'parent_doctype',
            'idx',
            //'supplier_name',
            //'lr_date',
            //'title',
            //'supplier_delivery_note',
            //'set_posting_time:datetime',
            //'instructions:ntext',
            //'address_display:ntext',
            //'_assign:ntext',
            //'taxes_and_charges_added',
            //'discount_amount',
            //'is_return',
            //'supplier_address',
            //'lr_no',
            //'contact_display:ntext',
            //'supplier',
            //'buying_price_list',
            //'terms:ntext',
            //'supplier_warehouse',
            //'taxes_and_charges_deducted',
            //'apply_discount_on',
            //'range',
            //'contact_person',
            //'in_words',
            //'additional_discount_percentage',
            //'return_against',
            //'contact_mobile:ntext',
            //'posting_time',
            //'total',
            //'bill_no',
            //'tc_name',
            //'rejected_warehouse',
            //'is_subcontracted',
            //'company',
            //'grand_total',
            //'language',
            //'rounding_adjustment',
            //'shipping_address',
            //'posting_date',
            //'naming_series',
            //'currency',
            //'letter_head',
            //'shipping_rule',
            //'total_taxes_and_charges',
            //'bill_date',
            //'status',
            //'_liked_by:ntext',
            //'taxes_and_charges',
            //'per_billed',
            //'transporter_name',
            //'total_net_weight',
            //'remarks:ntext',
            //'shipping_address_display:ntext',
            //'net_total',
            //'contact_email:ntext',

        ],
    ]); ?>
</div>
