<?php

namespace crudle\ext\stock\models;

use crudle\app\main\models\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Item_Price".
 *
 * @propertyItem $stockItem
 * @property PriceList $priceList
 */
class ItemPrice extends ActiveRecord
{
    public static function tableName()
    {
        return 'lgct_Item_Price';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['price_list_rate', 'item_id', 'price_list_id'], 'required'],
            [['item_id', 'price_list_id'], 'integer'],
            [['price_list_rate'], 'number'],
            [['item_description'], 'string'],
            [['currency'], 'string', 'max' => 3],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'price_list_rate' => Yii::t('app', 'Price List Rate'),
            'item_id' => Yii::t('app', 'Stock Item'),
            'price_list_id' => Yii::t('app', 'Price List'),
            'currency' => Yii::t('app', 'Currency'),
            'item_description' => Yii::t('app', 'Item Description'),
        ]);
    }

    public function getItem()
    {
        return $this->hasOne(Item::class, ['id' => 'item_id']);
    }

    public function getPriceList()
    {
        return $this->hasOne(PriceList::class, ['id' => 'price_list_id']);
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
