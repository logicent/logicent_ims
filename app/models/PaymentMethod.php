<?php

namespace app\models;

use app\enums\Status_Active;
use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "payment_method".
 */
class PaymentMethod extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'payment_method';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['id'], 'required'],
            [['description'], 'string'],
            [['inactive', 'is_default'], 'boolean']
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'inactive' => Yii::t('app', 'Inactive'),
            'is_default' => Yii::t('app', 'Is default'),
            // 'account_id' => Yii::t('app', 'GL Account'),
        ]);
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
