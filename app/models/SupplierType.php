<?php

namespace app\models;

use app\models\base\BaseSetupMasterData;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "supplier_type".
 */
class SupplierType extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'supplier_type';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['supplier_details', 'supplier_type'], 'string'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'supplier_details' => Yii::t('app', 'Supplier Details'),
            'supplier_type' => Yii::t('app', 'Supplier Type'),
        ]);
    }

    public function getPurchaseOrder()
    {
        return $this->hasMany(PurchaseOrder::class, ['supplier_id' => 'id']);
    }
}
