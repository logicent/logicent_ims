<?php

namespace logicent\accounts\models\base;

use logicent\accounts\models\base\BaseSetupMasterData;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the base model class for tax charge models.
 */
class BaseTaxCharge extends BaseSetupMasterData
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
            [['tax_included'], 'boolean'],
            [['name', 'type'], 'string', 'max' => 140],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Code'),
            'rate' => Yii::t('app', 'Rate'),
            'type' => Yii::t('app', 'Type'),
            'tax_included' => Yii::t('app', 'Tax included'),
        ]);
    }

    public function getCustomers()
    {
        return $this->hasMany(Customer::class, ['customer_group' => 'id']);
    }
}
