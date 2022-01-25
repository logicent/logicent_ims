<?php

namespace app\models\base;

use app\models\base\BaseActiveRecordDetail;
use app\models\setup\ListViewSettingsForm;
use app\models\Item;
use Yii;

class BaseTransactionItem extends BaseActiveRecordDetail implements PostingInterface
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'item_name'; // override in view index
        $this->listSettings->listIdAttribute = 'order_no'; // override in view index
    }

    public function rules()
    {
        return [
            [['item_id', 'quantity', 'unit_price', 'total_amount'], 'required'],
            [[
                'quantity', 'unit_price', 'discount_percent', 'discount_amount', 'tax_percent', 'tax_amount',
                'net_amount', 'total_amount', 'gross_profit'
            ], 'number'],
            [[
                'item_id', 'item_uom', 'item_name', 'item_status', 'description', 'account_id'
            ], 'string', 'max' => 140],
            ['is_free_item', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'item_id' => Yii::t('app', 'Code'),
            'item_name' => Yii::t('app', 'Name'),
            'item_status' => Yii::t('app', 'Status'),
            'description' => Yii::t('app', 'Description'),
            'quantity' => Yii::t('app', 'Qty'),
            'item_uom' => Yii::t('app', 'UoM'),
            'unit_price' => Yii::t('app', 'Price'),
            'is_free_item' => Yii::t('app', 'Is free'),
            'discount_amount' => Yii::t('app', 'Disc. amt'),
            'discount_percent' => Yii::t('app', 'Disc. %'),
            'tax_amount' => Yii::t('app', 'Tax amt'),
            'tax_percent' => Yii::t('app', 'Tax %'),
            'net_amount' => Yii::t('app', 'Net amt'),
            'total_amount' => Yii::t('app', 'Total'),
            'gross_profit' => Yii::t('app', 'GP'),
            'account_id' => Yii::t('app', 'COGS account'),
        ];
    }

    public function getItem()
    {
        return $this->hasOne(Item::class, ['id' => 'item_id']);
    }

    public function hasInventoryImpact()
    {
        return $this->document->hasInventoryImpact();
    }

    public function updateInventory()
    {
    }

    public function hasAccountingImpact()
    {
        return $this->document->hasAccountingImpact();
    }

    public function updateAccounting()
    {
    }

    public function afterSave($insert, $changedAttributes)
    {
        // Create item_warehouse entries for items
        if ($insert && $this->hasInventoryImpact())
            $this->updateInventory();

        return parent::afterSave($insert, $changedAttributes);
    }
}
