<?php

namespace app\models;

use app\models\base\BaseSettingsForm;
use Yii;

class SupplierSettingsForm extends BaseSettingsForm
{
    public $auto_suggest_supplier_id = false;
    public $default_supplier_group;
    public $default_buying_price_list;
    public $require_purchase_order_for_purchase_invoice = false;
    public $require_purchase_receipt_for_purchase_invoice = false;
    public $allow_item_to_be_added_multiple_times_in_a_transactation = true;
    public $allow_multiple_purchase_orders_against_a_purchase_invoice = false;
    public $hide_suppliers_tax_ID_from_purchase_transaction = false;
    public $maintain_same_rate_in_purchase_cycle = false;
    public $allow_user_to_edit_price_list_rate_in_transactions = false;

    public function rules()
    {
        return [
            [[
                'auto_suggest_supplier_id',
                'default_supplier_group',
                'default_buying_price_list',
                'require_purchase_order_for_purchase_invoice',
                'require_purchase_receipt_for_purchase_invoice',
                'allow_item_to_be_added_multiple_times_in_a_transactation',
                'allow_multiple_purchase_orders_against_a_purchase_invoice',
                'hide_suppliers_tax_ID_from_purchase_transaction',
                'maintain_same_rate_in_purchase_cycle',
                'allow_user_to_edit_price_list_rate_in_transactions',
            ], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'auto_suggest_supplier_id' => Yii::t('app', 'Auto-suggest new supplier ID'),
            'default_supplier_group' => Yii::t('app', 'Default supplier group'),
            'default_buying_price_list' => Yii::t('app', 'Default buying price list'),
            'require_purchase_order_for_purchase_invoice' => Yii::t('app', 'Require purchase order for purchase invoice'),
            'require_purchase_receipt_for_purchase_invoice' => Yii::t('app', 'Require purchase receipt for purchase invoice'),
            'allow_item_to_be_added_multiple_times_in_a_transactation' => Yii::t('app', 'Allow item to be added multiple times in a transaction'),
            'allow_multiple_purchase_orders_against_a_purchase_invoice' => Yii::t('app', 'Alow multiple purchase orders against a purchase invoice'),
            'hide_suppliers_tax_ID_from_purchase_transaction' => Yii::t('app', 'Hide suppliers tax ID from purchase transaction'),
            'maintain_same_rate_in_purchase_cycle' => Yii::t('app','Maintain same rate in purchase cycle'),
            'allow_user_to_edit_price_list_rate_in_transactions' => Yii::t('app','Allow user to edit price list rate in transactions'),
        ];
    }

    public function attributeHints()
    {
        return [
            // 'default_supplier_group' => Yii::t('app', 'Use moving average valuation'),
        ];
    }
}