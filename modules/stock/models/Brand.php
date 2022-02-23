<?php

namespace logicent\stock\models;

use app\enums\Status_Active;
use logicent\accounts\models\base\BaseSetupMasterData;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "brand".
 *
 * @property Item[] $items
 */
class Brand extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'brand';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [[
                'default_warehouse', 'default_price_list', 'default_supplier', 'image_path'
            ], 'string', 'max' => 140],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'default_warehouse' => Yii::t('app', 'Default warehouse'),
            'default_price_list' => Yii::t('app', 'Default price list'),
            'default_supplier' => Yii::t('app', 'Default supplier'),
            'image_path' => Yii::t('app', 'Image path'),
        ]);
    }

    public function getCustomers()
    {
        return $this->hasMany(Customer::class, ['customer_group' => 'id']);
    }
}
