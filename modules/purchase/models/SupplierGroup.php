<?php

namespace logicent\purchase\models;

use logicent\accounts\models\base\BaseSetupMasterData;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "supplier_group".
 */
class SupplierGroup extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'supplier_group';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['supplier_details', 'supplier_group'], 'string'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'supplier_details' => Yii::t('app', 'Supplier Details'),
            'supplier_group' => Yii::t('app', 'Supplier Group'),
        ]);
    }

    public function getSuppliers()
    {
        return $this->hasMany(Supplier::class, ['supplier_group' => 'id']);
    }
}
