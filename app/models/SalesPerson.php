<?php

namespace app\models;

use app\models\base\BaseSetupMasterData;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sales_person".
 */
class SalesPerson extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'sales_person';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['employee_name'], 'string', 'max' => 140],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'employee_name'   => Yii::t('app', 'Employee name'),
        ]);
    }
}
