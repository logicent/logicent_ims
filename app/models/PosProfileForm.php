<?php

namespace app\models;

use app\enums\Item_View;
use app\enums\Type_Sale;
use app\models\base\BaseSettingsForm;
use Yii;

class PosProfileForm extends BaseSettingsForm
{
    public $default_warehouse;
    public $warehouses;
    public $item_groups;
    public $default_item_view = Item_View::List;
    public $default_sale_type = Type_Sale::Cash;
    public $hide_credit_sale;
    public $hide_hold_sale;
    public $show_sales_person = false;
    public $require_sales_person = false;
    public $require_sales_return_reason = true;
    public $return_policy;
    public $show_shipping = false;
    public $show_discount = false;
    public $default_discount_percent;
    public $allow_user_discount_edit = false;
    public $default_customer;
    public $allow_user_price_edit = false;
    // public $allow_quantity_below_one = false;
    public $allow_negative_stock = false;
    public $amounts_tax_inclusive = true;
    // public $require_cart_item_delete_authorization = false;
    // public $persist_pos_state_for_current_user = false; // i.e. show last item_group, warehouse, customer etc.???
    // public $default_valid_days_in_sales_quote = 30;
    // public $use_sales_order_in_credit_sale = false;
    // public $item_search_order_preference; // item_id/barcode/item_name
    // public $gift_voucher_number; // generate series/random

    // warehouse_id
    // branch_id
    // inactive (in multi pos profile)
    // linked_users (must have cashier/sales assistant/sales manager role)
    // default_user
    // payment_methods
    // default_payment_method
    // hide_unavailable_items
    // auto_add_filtered_item_to_cart?
    // hide_images
    // item_group_filters // Only show Items from these Item Groups
    // customer_group_filters // Only show Customer of these Customer Groups
    // price_list_id
    // currency
    // tax_charge
    // apply_discount_on (GrandTotal or NetTotal)

    public function rules()
    {
        return [
            [[
                'default_warehouse',
                'warehouses',
                'item_groups',
                'default_item_view',
                'default_sale_type',
                'hide_credit_sale',
                'hide_hold_sale',
                'require_sales_return_reason',
                'require_sales_person',
                'show_sales_person',
                'show_shipping',
                'show_discount',
                'allow_user_discount_edit',
                'default_customer',
                'allow_user_price_edit',
                'allow_negative_stock',
                'amounts_tax_inclusive',
                // 'default_valid_days_in_sales_quote',
                // 'use_sales_order_in_credit_sale'
            ], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'default_warehouse' => Yii::t('app', 'Default warehouse'),
            'warehouses' => Yii::t('app', 'Warehouses'),
            'item_groups' => Yii::t('app', 'Item groups'),
            'default_item_view' => Yii::t('app', 'Default item view'),
            'default_sale_type' => Yii::t('app', 'Default sale type'),
            'hide_credit_sale' => Yii::t('app', 'Hide credit sale option in sale type'),
            'hide_hold_sale' => Yii::t('app', 'Hide hold sale action in sale'),
            'require_sales_return_reason' => Yii::t('app', 'Require a reason for sales return'),
            'show_sales_person' => Yii::t('app', 'Show sales person field'),
            'require_sales_person' => Yii::t('app', 'Require a sales person in sale'),
            'show_shipping' => Yii::t('app', 'Show delivery in sale total'),
            'show_discount' => Yii::t('app', 'Show discount column in item list'),
            'allow_user_discount_edit' => Yii::t('app', 'Allow current user to edit discount'),
            'default_customer' => Yii::t('app', 'Default customer'),
            'allow_user_price_edit' => Yii::t('app', 'Allow current user to edit price'),
            'allow_negative_stock' => Yii::t('app', 'Allow negative stock quantity in sale'),
            'amounts_tax_inclusive' => Yii::t('app', 'Amounts are tax inclusive in sale total'),
            // 'default_valid_days_in_sales_quote' => Yii::t('acp', 'Default valid days in sales quote'),
            // 'use_sales_order_in_credit_sale' => Yii::t('app', 'Use sales order in credit sale'),
        ];
    }

    public function attributeHints()
    {
        return [
            // 'default_customer' => Yii::t('app', 'Required in cash sale'),
        ];
    }
}