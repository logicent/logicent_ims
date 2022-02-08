<?php

namespace app\models;

use app\enums\Status_Active;
use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "item_warehouse".
 */
class ItemWarehouse extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'item_warehouse';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['id'], 'required'],
            [['id', 'item_id', 'warehouse_id'], 'string', 'max' => 140],
            [['qty_in_stock', 'qty_ordered', 'qty_reserved', 'qty_committed'], 'number'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Name'),
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
            'inactive' => Status_Active::class
        ];
    }
}
