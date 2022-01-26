<?php

namespace app\models;

use app\enums\Status_Active;
use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "item_group".
 */
class ItemGroup extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'item_group';
    }

    public function rules()
    {
        return [
            [['id'], 'required'],
            [['inactive'], 'boolean'],
            [['id', 'description'], 'string', 'max' => 140],
        ];
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Name'),
            'inactive' => Yii::t('app', 'Inactive'),
            'description' => Yii::t('app', 'Description'),
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
