<?php

namespace app\models;

use app\enums\Status_Active;
use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tax_charge".
 */
class TaxCharge extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'tax_charge';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['rate'], 'number'],
            [['id'], 'required'],
            [['tax_included', 'inactive'], 'boolean'],
            [['id', 'name', 'type'], 'string', 'max' => 140],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Code'),
            'rate' => Yii::t('app', 'Rate'),
            'type' => Yii::t('app', 'Type'),
            'inactive' => Yii::t('app', 'Inactive'),
            'tax_included' => Yii::t('app', 'Tax included'),
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
