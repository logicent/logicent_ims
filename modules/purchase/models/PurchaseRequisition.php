<?php

namespace crudle\ext\purchase\models;

use crudle\ext\accounts\enums\Type_Module;
use crudle\ext\accounts\models\base\BaseTransactionDocument;
use crudle\app\setup\models\ListViewSettingsForm;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "purchase_requisition".
 */
class PurchaseRequisition extends BaseTransactionDocument
{
    const DOC_NUM_PREFIX = 'PO-';

    public $supplier_phone;

    public function init()
    {
        // parent::init();
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'supplier_name'; // override in view index
        $this->listSettings->listIdAttribute = 'supplier_phone'; // override in view index
    }

    public static function moduleType()
    {
        return Type_Module::Buying;
    }

    public static function tableName()
    {
        return 'lgct_Purchase_Requisition';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['supplier_id'], 'required'],
            [['supplier_id'], 'integer'],
            [['pr_reference'], 'string'],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'id' => Yii::t('app', 'Order No.'),
            'supplier_id' => Yii::t('app', 'Supplier'),
            'supplier_name' => Yii::t('app', 'Supplier name'),
            'is_return' => Yii::t('app', 'Is return (Debit note)'),
            'is_internal_supplier' => Yii::t('app', 'Is internal supplier'),
        ], $attributeLabels);
    }

    public function getSupplier()
    {
        return $this->hasOne(Supplier::class, ['id' => 'supplier_id']);
    }

    public function getItems()
    {
        return $this->hasMany(PurchaseOrderItem::class, ['purchase_requisition_id' => 'id']);
    }

    public function getPayments()
    {
        return $this->hasMany(PurchaseOrderPayment::class, ['purchase_requisition_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        // return true;
        return parent::beforeSave($insert);
    }

    public function docNumPrefix()
    {
        return self::DOC_NUM_PREFIX;
    }

    public function afterFind()
    {
        $this->supplier_phone = $this->supplier->phone_number;

        return parent::afterFind();
    }
}
