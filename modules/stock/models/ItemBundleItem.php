<?php

namespace logicent\stock\models;

use app\modules\main\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "item_bundle_item".
 *
 * @property Item $item
 */
class ItemBundleItem extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'item_bundle_item';
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
