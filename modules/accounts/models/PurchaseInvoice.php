<?php

namespace crudle\ext\accounts\models;

use crudle\ext\accounts\enums\Type_Module;
use crudle\ext\accounts\models\base\BaseTransactionDocument;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Purchase_Invoice".
 */
class PurchaseInvoice extends BaseTransactionDocument
{
    const DOC_NUM_PREFIX = 'PINV-';

    public $supplier_phone;

    public static function moduleType()
    {
        return Type_Module::Buying;
    }

    public static function tableName()
    {
        return 'lgct_Purchase_Invoice';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['supplier_id', 'due_date'], 'required'],
            [[
                'supplier_id', 'supplier_name', 'supplier_phone', 'order_type', 'si_reference', 'por_profile_id'
            ], 'string'],
            [['is_por'], 'boolean'],
            [['si_date', 'due_date'], 'date', 'format' => 'php:Y-m-d'],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'id' => Yii::t('app', 'Invoice No.'),
            'supplier_id' => Yii::t('app', 'Supplier'),
            'supplier_name' => Yii::t('app', 'Supplier name'),
            'si_reference' => Yii::t('app', 'Supplier Invoice no.'),
            'si_date' => Yii::t('app', 'Supplier Invoice date'),
            'due_date' => Yii::t('app', 'Due date'),
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
        return $this->hasMany(PurchaseInvoiceItem::class, ['purchase_invoice_id' => 'id']);
    }
    
    public function getPayments()
    {
        return $this->hasMany(PurchaseInvoicePayment::class, ['purchase_invoice_id' => 'id']);
    }

    public function docNumPrefix()
    {
        return self::DOC_NUM_PREFIX;
    }

    public function afterFind()
    {
        $this->supplier_name = $this->supplier->name;

        return parent::afterFind();
    }
}
