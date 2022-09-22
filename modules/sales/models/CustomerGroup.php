<?php

namespace crudle\ext\sales\models;

use crudle\ext\accounts\models\base\BaseSetupMasterData;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Customer_Group".
 *
 * @property Customer[] $customers
 */
class CustomerGroup extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'lgct_Customer_Group';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['credit_days'], 'integer'],
            [['credit_limit'], 'number'],
            [['default_price_list', 'credit_days_based_on'], 'string', 'max' => 140],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'credit_limit' => Yii::t('app', 'Credit Limit'),
            'credit_days_based_on' => Yii::t('app', 'Credit Days Based On'),
            'default_price_list' => Yii::t('app', 'Default Price List'),
            'credit_days' => Yii::t('app', 'Credit Days'),
        ]);
    }

    public function getCustomers()
    {
        return $this->hasMany(Customer::class, ['customer_group' => 'id']);
    }
}
