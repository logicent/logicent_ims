<?php

namespace app\models;

use app\enums\Type_Relation;
use app\models\base\BaseTransactionDocument;
use app\models\setup\ListViewSettingsForm;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sales_invoice".
 */
class SalesInvoice extends BaseTransactionDocument
{
    const DOC_NUM_PREFIX = 'SINV-';

    public $customer_phone;

    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'customer_name'; // override in view index
        $this->listSettings->listIdAttribute = 'customer_phone'; // override in view index
    }

    public static function tableName()
    {
        return 'sales_invoice';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['customer_id', 'due_date'], 'required'],
            [[
                'customer_id', 'customer_name', 'order_type', 'po_reference', 'pos_profile_id',
            ], 'string'],
            [['is_pos'], 'boolean'],
            [['po_date', 'due_date'], 'date', 'format' => 'php:Y-m-d'],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'id' => Yii::t('app', 'Invoice No.'),
            'po_reference' => Yii::t('app', "Customer's Purchase Order"),
            'po_date' => Yii::t('app', "Customer's PO date"),
            'customer_id' => Yii::t('app', 'Customer'),
            'customer_name' => Yii::t('app', 'Customer name'),
            'due_date' => Yii::t('app', 'Payment due date'),
            'order_type' => Yii::t('app', 'Order type'),
            'pos_profile_id' => Yii::t('app', 'POS profile'),
            'is_pos' => Yii::t('app', 'Include payment (POS)'),
            'is_return' => Yii::t('app', 'Is return (Credit note)'),
            'is_internal_customer' => Yii::t('app', 'Is internal customer'),
        ], $attributeLabels);
    }

    public static function relations()
    {
        return [
            'items'     => [
                'class' => SalesInvoiceItem::class,
                'type' => Type_Relation::ChildModel
            ],
            'payments'  => [
                'class' => SalesInvoicePayment::class,
                'type' => Type_Relation::ChildModel
            ],
            // 'receipt'  => [
            //     'class' => PosReceipt::class,
            //     'type' => Type_Relation::SiblingModel
            // ],
        ];
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }

    public function getItems()
    {
        return $this->hasMany(SalesInvoiceItem::class, ['sales_invoice_id' => 'id']);
    }

    public function getPayments()
    {
        return $this->hasMany(SalesInvoicePayment::class, ['sales_invoice_id' => 'id']);
    }

    public function getReturnAgainst()
    {
        return $this->hasOne(self::class, ['return_against_id' => 'id']);
    }

    public function docNumPrefix()
    {
        return self::DOC_NUM_PREFIX;
    }

    public function afterFind()
    {
        $this->customer_name = $this->customer->name;
        $this->customer_phone = $this->customer->phone_number;

        return parent::afterFind();
    }
}
