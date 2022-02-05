<?php

namespace app\models;

use app\models\base\BaseSettingsForm;
use Yii;

class CustomerSettingsForm extends BaseSettingsForm
{
    public $auto_suggest_customer_id = false;
    public $default_customer_group;
    public $default_selling_price_list;
    public $require_sales_order_for_sales_invoice = false;
    public $require_delivery_note_for_sales_invoice = false;
    public $allow_item_to_be_added_multiple_times_in_a_transactation = true;
    public $allow_multiple_sales_orders_against_a_customers_PO = false;
    public $hide_customers_tax_ID_from_sales_transaction = false;
    public $maintain_same_rate_in_sales_cycle = false;
    public $allow_user_to_edit_price_list_rate_in_transactions = false;
    public $validate_selling_price_for_item_against_purchase_rate_or_valuation_rate = false;
    public $calculate_item_bundle_price_based_on_child_items_rates = false;

    public function rules()
    {
        return [
            [[
                'auto_suggest_customer_id',
                'default_customer_group',
                'default_selling_price_list',
                'require_sales_order_for_sales_invoice',
                'require_delivery_note_for_sales_invoice',
                'allow_item_to_be_added_multiple_times_in_a_transactation',
                'allow_multiple_sales_orders_against_a_customers_PO',
                'hide_customers_tax_ID_from_sales_transaction',
                'maintain_same_rate_in_sales_cycle',
                'allow_user_to_edit_price_list_rate_in_transactions',
                'validate_selling_price_for_item_against_purchase_rate_or_valuation_rate',
                'calculate_item_bundle_price_based_on_child_items_rates',
            ], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'auto_suggest_customer_id' => Yii::t('app', 'Auto-suggest new customer ID'),
            'default_customer_group' => Yii::t('app', 'Default customer group'),
            'default_selling_price_list' => Yii::t('app', 'Default selling price list'),
            'require_sales_order_for_sales_invoice' => Yii::t('app', 'Require sales order for sales invoice'),
            'require_delivery_note_for_sales_invoice' => Yii::t('app', 'Require delivery note for sales invoice'),
            'allow_item_to_be_added_multiple_times_in_a_transactation' => Yii::t('app', 'Allow item to be added multiple times in a transaction'),
            'allow_multiple_sales_orders_against_a_customers_PO' => Yii::t('app', 'Alow multiple sales orders against a customer PO'),
            'hide_customers_tax_ID_from_sales_transaction' => Yii::t('app', 'Hide customers tax ID from sales transaction'),
            'maintain_same_rate_in_sales_cycle' => Yii::t('app','Maintain same rate in sales cycle'),
            'allow_user_to_edit_price_list_rate_in_transactions' => Yii::t('app','Allow user to edit price list rate in transactions'),
            'validate_selling_price_for_item_against_purchase_rate_or_valuation_rate' => Yii::t('app','Validate selling price for item against purchase rate or valuation rate'),
            'calculate_item_bundle_price_based_on_child_items_rates' => Yii::t('app','Calculate item bundle price based on child items rates'),
        ];
    }

    public function attributeHints()
    {
        return [
            // 'default_customer_group' => Yii::t('app', 'Use moving average valuation'),
        ];
    }
}