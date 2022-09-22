<?php

namespace crudle\ext\accounts\models;

use crudle\ext\accounts\models\base\BaseSetupMasterData;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Payment_Method".
 */
class PaymentMethod extends BaseSetupMasterData
{
    // gl_account
    // bank_account

    public static function tableName()
    {
        return 'lgct_Payment_Method';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            ['is_default', 'boolean']
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'is_default' => Yii::t('app', 'Is default'),
        ]);
    }
}
