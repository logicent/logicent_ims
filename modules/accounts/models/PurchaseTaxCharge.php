<?php

namespace crudle\ext\accounts\models;

use crudle\ext\accounts\models\base\BaseTaxCharge;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Purchase_Tax_Charge".
 */
class PurchaseTaxCharge extends BaseTaxCharge
{
    public static function tableName()
    {
        return 'lgct_Purchase_Tax_Charge';
    }

    public function getSuppliers()
    {
        return $this->hasMany(Supplier::class, ['supplier_group' => 'id']);
    }
}
