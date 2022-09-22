<?php

namespace crudle\ext\sales\models;

use crudle\ext\accounts\models\base\BaseSetupMasterData;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Sales_Person".
 */
class SalesPerson extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'lgct_Sales_Person';
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
