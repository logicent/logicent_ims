<?php

use crudle\app\helpers\SelectableItems;
use crudle\ext\sales\models\Customer;
use crudle\ext\sales\models\SalesPerson;
use crudle\ext\stock\models\Warehouse;
use yii\helpers\Html;
use icms\FomanticUI\Elements;
use icms\FomanticUI\modules\Select;
use icms\FomanticUI\widgets\ActiveForm;


$form = ActiveForm::begin([
    'enableClientValidation' => false,
    'options' => [
        'class' => 'ui form',
        'autocomplete' => 'off'
    ]
])
?>
<div class="ui attached padded segment">
    <div class="ui two column grid">
        <div class="eleven wide column">
            <div class="two fields">
                <div class="eleven wide field">
                    <?= $form
                            ->field($pos_receipt, 'itemSearch')
                            ->textInput([
                                'id' => 'pos__item-search',
                                'placeholder' => Yii::t('app', 'Scan barcode or enter item code or name...')
                            ])
                            ->label(Yii::t('app', 'Find item')) ?>

                    <div id="pos__search_result" class="ui middle aligned divided selection relaxed link list" style="display: none;">
                        <a id="no_item_found" class="item" style="display:none">
                            <div class="right floated content"></div>
                            <div class="content"><?= Yii::t('app', 'No item found') ?></div>
                        </a>
                    </div>
                </div>
                <div class="five wide field">
                    <?= $form->field($pos_receipt, 'itemWarehouse')->widget(Select::class, [
                            'search' => true,
                            'items' => SelectableItems::get( Warehouse::class, $pos_receipt, [
                                            'keyAttribute' => 'id',
                                            'valueAttribute' => 'id',
                                            'filters' => [
                                                ['inactive' => false]
                                            ],
                                        ]),
                            'options' => [
                                'id' => 'pos__item-warehouse',
                                'class' => 'select-from-list text-required',
                            ],
                            'value' => $pos_profile->default_warehouse
                        ])->label(Yii::t('app', 'In location')) ?>
                </div>
            </div>
            <?= $this->render('item/index', [
                    'pos_profile' => $pos_profile,
                    'pos_receipt_items' => $pos_receipt_item
                ]) ?>
        </div>
        <div class="five wide column">
            <!-- <div class="ui action input"> -->
            <?= $form->field($pos_receipt, 'customer_id')->widget(Select::class, [
                    'search' => true,
                    'items' => SelectableItems::get( Customer::class, $pos_receipt, [
                                    'valueAttribute' => 'name',
                                    // 'addEmptyFirstItem' => true,
                                ]),
                    'options' => [
                        'id' => 'pos__customer_id',
                        'class' => 'select-from-list text-required',
                        'value' => $pos_profile->default_customer
                    ]
                ])->label(Yii::t('app', 'Sell to customer')) ?>
                <!-- <button class="compact ui icon button" style="max-height: 3em; margin-top: 1.7em;"><?= Elements::icon('plus') ?></button> -->
            <!-- </div> -->
            <div class="fluid ui buttons">
                <?= $this->render('_sale_type', ['pos_profile' => $pos_profile]) ?>
                <?= Html::a(Yii::t('app', 'Hold / Cont.'), ['hold-sale'], [
                        'class' => 'ui basic orange button',
                        'id' => 'hold_sale__btn',
                        'data' => ['method' => 'post']
                    ]) ?>
                <?= Html::a(Yii::t('app', 'Cancel'), ['cancel-sale'], [
                        'class' => 'disabled ui basic grey button',
                        'id' => 'cancel_sale__btn',
                        'data' => ['method' => 'post']
                    ]) ?>
            </div>
            <?= $this->render('_sale_total', [
                    'pos_profile' => $pos_profile,
                    'pos_receipt' => $pos_receipt,
                    'pos_receipt_payment' => $pos_receipt_payment,
                    'pos_receipt' => $pos_receipt,
                ]) ?>
            <?= $this->render('_sale_action', [
                    'pos_profile' => $pos_profile
                ]) ?>
        <?php
        if ( (bool) $pos_profile->show_sales_person ) :
            echo $form->field($pos_receipt, 'sales_person_id')->dropDownList(
                    SelectableItems::get(SalesPerson::class, $pos_receipt, [
                        'valueAttribute' => 'id',
                        'filters' => ['inactive' => false],
                        'addEmptyFirstItem' => true,
                    ])
                );
        endif;
        // if ( (bool) $pos_profile->show_shipping ) :
            // echo Html::activeTextInput($pos_receipt, 'shipping_fee', ['class' => 'right aligned']);
            // echo Html::activeTextInput($pos_receipt, 'shipping_tax', ['class' => 'right aligned']);
            // echo Html::activeTextInput($pos_receipt, 'shipping_amount', ['class' => 'right aligned']);
            // echo $form->field($pos_receipt, 'shippingAddress')->textarea(
            //         ['style' => 'min-height: 60px', 'readonly' => true]
            // );
        // endif;
        echo $form->field($pos_receipt, 'notes')->textarea([
                    'rows' => 3,
                    'id' => 'pos__notes',
                    'style' => 'min-height: 60px',
                ]
            ) ?>
        </div>
    </div>
</div>
    <!-- Master form (POS Invoice) -->
    <?= Html::activeHiddenInput($pos_receipt, 'id') ?>
    <?= Html::activeHiddenInput($pos_receipt, 'posting_date', ['value' => date('Y-m-d')]) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'due_date', ['id' => 'pos__due_date', 'value' => date('Y-m-d')]) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'customer_name') ?>
    <?= Html::activeHiddenInput($pos_receipt, 'branch_id'); ?>
    <?= Html::activeHiddenInput($pos_receipt, 'pos_profile_id', ['value' => 'Default']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'status', ['id' => 'pos__status']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'update_stock', ['id' => 'pos__update_stock']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'is_pos', ['id' => 'pos__is_pos']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'is_return', ['id' => 'pos__is_return']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'currency', ['id' => 'pos__currency']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'price_list_id', ['id' => 'pos__price_list']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'total_quantity', ['id' => 'pos__total_quantity']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'net_total', ['id' => 'pos__net_total']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'tax_amount', ['id' => 'pos__tax_amount']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'amounts_tax_inclusive', ['id' => 'pos__amounts_tax_inclusive']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'total_amount', ['id' => 'pos__total_amount']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'paid_status', ['id' => 'pos__paid_status']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'deposit_amount', ['id' => 'pos__deposit_amount']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'paid_amount', ['id' => 'pos__paid_amount']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'change_amount', ['id' => 'pos__change_amount']) ?>
    <?= Html::activeHiddenInput($pos_receipt, 'balance_amount', ['id' => 'pos__balance_amount']) ?>

<?php ActiveForm::end();
$this->registerJs( $this->render('item_search.js') );