<?php

namespace app\models;

use app\enums\Status_Active;
use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sales_person".
 */
class SalesPerson extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'sales_person';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            ['id', 'required'],
            ['inactive', 'boolean'],
            [['employee_name'], 'string', 'max' => 140],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Name'),
            'inactive'     => Yii::t('app', 'Inactive'),
            'employee_name'   => Yii::t('app', 'Employee name'),
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
