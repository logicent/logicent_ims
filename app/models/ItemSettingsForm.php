<?php

namespace app\models;

use app\models\base\BaseSettingsForm;
use Yii;

class ItemSettingsForm extends BaseSettingsForm
{
    public $auto_suggest_item_code = false;
    public $calc_avg_price_receiving = false;
    public $allow_negative_stock_balance = false;
    public $item_search_order_preference; // item_id/barcode/item_name
    public $gift_voucher_number; // generate series/random

    public function rules()
    {
        return [
            ['auto_suggest_item_code', 'boolean'],
            [[
                'calc_avg_price_receiving'
            ], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'calc_avg_price_receiving' => Yii::t('app', 'Calc. average price (receiving)'),
            'auto_suggest_item_code' => Yii::t('app', 'Auto-suggest new item code'),
        ];
    }

    public function attributeHints()
    {
        return [
            // 'calc_avg_price_receiving' => Yii::t('app', 'Use moving average valuation'),
        ];
    }
}