<?php

namespace logicent\accounts\models;

use logicent\accounts\models\base\BaseSetupMasterData;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "price_list".
 *
 * @property ItemPrice[] $stockItemPrices
 */
class PriceList extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'price_list';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['module'], 'required'],
            [['currency'], 'string', 'max' => 3],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'currency' => Yii::t('app', 'Currency'),
            'module' => Yii::t('app', 'Module'),
        ]);
    }

    public function getItemPrices()
    {
        return $this->hasMany(ItemPrice::class, ['price_list_id' => 'id']);
    }
}
