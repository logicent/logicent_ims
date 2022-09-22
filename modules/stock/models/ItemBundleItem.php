<?php

namespace crudle\ext\stock\models;

use crudle\app\main\models\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Item_Bundle_Item".
 *
 * @property Item $item
 */
class ItemBundleItem extends ActiveRecord
{
    public static function tableName()
    {
        return 'lgct_Item_Bundle_Item';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [[
                'item_id', 'uom'], 'string', 'max' => 140],
            [['quantity'], 'number'],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'item_id' => Yii::t('app', 'Item'),
            'quantity' => Yii::t('app', 'Quantity'),
            'uom' => Yii::t('app', 'Uom'),
        ], $attributeLabels);
    }

    public function getItems()
    {
        return $this->hasMany(Item::class, ['item_id' => 'id']);
    }
}
