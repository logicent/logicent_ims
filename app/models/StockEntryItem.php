<?php

namespace app\models\stock;

use app\models\base\BaseActiveRecordDetail;
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
            [['quantity', 'item_id', 'item_rate', 'item_amount'], 'number'],
            [[ 'item_name', 'serial_no', 'batch_no', 'description'], 'string'],
            [['from_warehouse', 'to_warehouse', 'uom', 'barcode', 'batch_no'], 'string', 'max' => 140],
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
}
