<?php

namespace app\models;

use app\enums\Status_Active;
use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "branch".
 *
 * @property Item[] $items
 */
class Branch extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'branch';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['id'], 'required'],
            ['inactive', 'boolean'],
            [['description'], 'string'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
        ]);
    }

    public function getCustomers()
    {
        return $this->hasMany(Customer::class, ['customer_group' => 'id']);
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
