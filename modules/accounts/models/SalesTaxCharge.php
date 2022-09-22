<?php

namespace crudle\ext\accounts\models;

use crudle\ext\accounts\models\base\BaseTaxCharge;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Sales_Tax_Charge".
 */
class SalesTaxCharge extends BaseTaxCharge
{
    public static function tableName()
    {
        return 'lgct_Sales_Tax_Charge';
    }

    public function getCustomers()
    {
        return $this->hasMany(Customer::class, ['customer_group' => 'id']);
    }
}
