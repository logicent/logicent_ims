<?php

namespace crudle\ext\stock\models;

use crudle\app\enums\Status_Active;
use crudle\app\main\models\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Item_Warehouse".
 */
class ItemWarehouse extends ActiveRecord
{
    public static function tableName()
    {
        return 'lgct_Item_Warehouse';
    }

    public static function primaryKey()
    {
        return ['warehouse_id', 'item_id'];
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['item_id', 'warehouse_id'], 'string', 'max' => 140],
            [['qty_in_stock', 'qty_ordered', 'qty_reserved', 'qty_committed'], 'number'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'item_id' => Yii::t('app', 'Item'),
            'warehouse_id' => Yii::t('app', 'Warehouse'),
            'qty_in_stock' => Yii::t('app', 'Qty in stock'),
            'qty_ordered' => Yii::t('app', 'Qty ordered'),
            'qty_reserved' => Yii::t('app', 'Qty reserved'),
            'qty_committed' => Yii::t('app', 'Qty committed'),
        ]);
    }

    public function getItem()
    {
        return $this->hasOne(Item::class, ['id' => 'item_id']);
    }

    public static function enums()
    {
        return [
            'status' => [
                'class' => Status_Active::class,
                'attribute' => 'inactive'
            ]
        ];
    }
}
