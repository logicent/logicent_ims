<?php

namespace logicent\accounts\models;

use logicent\accounts\models\base\BaseTaxCharge;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sales_tax_charge".
 */
class SalesTaxCharge extends BaseTaxCharge
{
    public static function tableName()
    {
        return 'sales_tax_charge';
    }

    public function getCustomers()
    {
        return $this->hasMany(Customer::class, ['customer_group' => 'id']);
    }
}
