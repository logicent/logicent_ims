<?php

namespace app\models;

use app\enums\Status_Active;
use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "price_list".
 *
 * @property ItemPrice[] $stockItemPrices
 */
class PriceList extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'price_list';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['inactive'], 'boolean'],
            [['id', 'module'], 'required'],
            [['id'], 'string', 'max' => 140],
            [['currency'], 'string', 'max' => 3],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Name'),
            'inactive' => Yii::t('app', 'Inactive'),
            'currency' => Yii::t('app', 'Currency'),
            'module' => Yii::t('app', 'Module'),
        ]);
    }

    public function getItemPrices()
    {
        return $this->hasMany(ItemPrice::class, ['price_list_id' => 'id']);
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
