<?php

namespace logicent\stock\models;

use app\modules\setup\models\base\BaseSettingsForm;
use Yii;

class StockSettingsForm extends BaseSettingsForm
{
    public $auto_suggest_item_code = false;
    public $default_item_group;
    public $default_item_uom;
    public $default_warehouse;
    public $item_valuation_method; // FIFO & Moving Average

    public $auto_insert_item_price_if_missing;
    public $update_existing_price_list_rate = false;
    public $allow_negative_stock_balance = false;
    public $show_barcode_field_in_stock_transactions = false;

    public $raise_purchase_request_when_stock_at_reorder_level;
    public $notify_by_email_on_creation_of_purchase_request;

    public function rules()
    {
        return [
            [[
                'auto_suggest_item_code',
                'default_item_group',
                'default_item_uom',
                'default_warehouse',
                'item_valuation_method',
                'auto_insert_item_price_if_missing',
                'update_existing_price_list_rate',
                'allow_negative_stock_balance',
                'show_barcode_field_in_stock_transactions',
                'raise_purchase_request_when_stock_at_reorder_level',
                'notify_by_email_on_creation_of_purchase_request',
            ], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'auto_suggest_item_code' => Yii::t('app', 'Auto-suggest new item code'),
            'default_item_group' => Yii::t('app', 'Default item group'),
            'default_item_uom' => Yii::t('app', 'Default item uom'),
            'default_warehouse' => Yii::t('app', 'Default warehouse'),
            'item_valuation_method' => Yii::t('app', 'Item valuation method'),
            'auto_insert_item_price_if_missing' => Yii::t('app', 'Auto-insert item price if missing'),
            'update_existing_price_list_rate' => Yii::t('app', 'Update existing price list rate'),
            'allow_negative_stock_balance' => Yii::t('app', 'Allow negative stock balance'),
            'show_barcode_field_in_stock_transactions' => Yii::t('app', 'Show barcode field in stock transactions'),
            'raise_purchase_request_when_stock_at_reorder_level' => Yii::t('app', 'Raise purchase request when stock at re-order level'),
            'notify_by_email_on_creation_of_purchase_request' => Yii::t('app', 'Notify by email on creation of purchase request'),
        ];
    }

    public function attributeHints()
    {
        return [
            // 'item_valuation_method' => Yii::t('app', 'Use moving average valuation'),
        ];
    }
}