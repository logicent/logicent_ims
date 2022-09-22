<?php

namespace crudle\ext\stock\models;

use crudle\ext\accounts\models\base\BaseSetupMasterData;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Item_Group".
 */
class ItemGroup extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'lgct_Item_Group';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['is_group'], 'boolean'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'is_group' => Yii::t('app', 'Is group'),
        ]);
    }

    public function getItems()
    {
        return $this->hasMany(Item::class, ['item_group' => 'id']);
    }

    public function getParentItemGroup()
    {
        return self::find()->select('name')->where(['id' => $this->parent_item_group])->scalar();
    }
}
