<?php

namespace logicent\accounts\models;

use app\enums\Type_Module;
use app\enums\Type_Relation;
use app\modules\setup\models\ListViewSettingsForm;
use logicent\accounts\models\base\BaseTransactionDocument;
use logicent\sales\models\Customer;
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

    public static function moduleType()
    {
        return Type_Module::Selling;
    }

    public static function tableName()
    {
        return 'sales_invoice';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            ['naming_series', 'default', 'value' => self::DOC_NUM_PREFIX],
            ['posting_time', 'default', 'value' => date('H:i:s', time())],
            [['customer_id', 'due_date'], 'required'],
            [[
                'sales_person_id', 'customer_id', 'customer_name', 'po_no', 'pos_profile_id',
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
            'po_no' => Yii::t('app', "Customer's Purchase Order"),
            'po_date' => Yii::t('app', "Customer's PO date"),
            'customer_id' => Yii::t('app', 'Customer'),
            'customer_name' => Yii::t('app', 'Customer name'),
            'due_date' => Yii::t('app', 'Payment due date'),
            'sales_person_id' => Yii::t('app', 'Sales person'),
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
