<?php

namespace logicent\accounts\models;

use logicent\accounts\models\base\BaseSetupMasterData;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "payment_method".
 */
class PaymentMethod extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'payment_method';
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
