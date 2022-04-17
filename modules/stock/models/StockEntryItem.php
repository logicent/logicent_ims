<?php

namespace logicent\stock\models;

use app\enums\Type_Relation;
use app\modules\main\models\base\BaseActiveRecordDetail;
use Yii;

class StockEntryItem extends BaseActiveRecordDetail
{
    public static function tableName()
    {
        return 'stock_entry_item';
    }

    public function rules()
    {
        return [
            [[
                'item_id', 'item_name', 'serial_no', 'batch_no', 'from_warehouse', 'to_warehouse', 'uom',
                'barcode'
            ], 'string', 'max' => 140],
            [['quantity', 'item_rate', 'item_total'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'from_warehouse' => Yii::t('app', 'From warehouse'),
            'to_warehouse' => Yii::t('app', 'To warehouse'),
            'uom' => Yii::t('app', 'Uom'),
            'quantity' => Yii::t('app', 'Quantity'),
            'item_rate' => Yii::t('app', 'Item rate'),
            'item_total' => Yii::t('app', 'Item total'),
            'item_id' => Yii::t('app', 'Item name'),
            'item_name' => Yii::t('app', 'Item name'),
            'batch_no' => Yii::t('app', 'Batch no.'),
            'serial_no' => Yii::t('app', 'Serial no.'),
        ];
    }

    public static function relations()
    {
        return [
            'stockEntry'     => [
                'class' => StockEntry::class,
                'type' => Type_Relation::ParentModel
            ],
            'item'     => [
                'class' => Item::class,
                'type' => Type_Relation::SiblingModel
            ],
        ];
    }

    public function getStockEntry()
    {
        return $this->hasOne(StockEntry::class, ['id' => 'stock_entry_id']);
    }

    public function getItem()
    {
        return $this->hasOne(Item::class, ['item_id' => 'id']);
    }

    public static function foreignKeyAttribute()
    {
        return 'stock_entry_id';
    }
}
