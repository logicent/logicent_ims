<?php

namespace logicent\accounts\models;

use logicent\accounts\models\base\BaseTaxCharge;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "purchase_tax_charge".
 */
class PurchaseTaxCharge extends BaseTaxCharge
{
    public static function tableName()
    {
        return 'purchase_tax_charge';
    }

    public function getSuppliers()
    {
        return $this->hasMany(Supplier::class, ['supplier_group' => 'id']);
    }
}
