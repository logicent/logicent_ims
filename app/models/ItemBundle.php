<?php

namespace app\models;

use app\enums\Status_Active;
use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "item_bundle".
 *
 * @property Item[] $items
 */
class ItemBundle extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'item_bundle';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['id'], 'required'],
            ['inactive', 'boolean'],
            [[
                'id', 'description', 'default_warehouse', 'default_price_list', 'default_supplier',
                'image_path'
            ], 'string', 'max' => 140],
            [['description'], 'string'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'default_warehouse' => Yii::t('app', 'Default warehouse'),
            'default_price_list' => Yii::t('app', 'Default price list'),
            'default_supplier' => Yii::t('app', 'Default supplier'),
            'image_path' => Yii::t('app', 'Image path'),
            'inactive' => Yii::t('app', 'Inactive'),
        ]);
    }

    public function getItems()
    {
        return $this->hasMany(ItemBundleItem::class, ['item_id' => 'id']);
    }

    public static function enums()
    {
        return [
            'inactive' => Status_Active::class
        ];
    }

    public static function autoSuggestIdValue()
    {
        return false;
    }
}
