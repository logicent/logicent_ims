<?php

namespace crudle\ext\sales\models;

use crudle\ext\accounts\enums\Type_Module;
use crudle\app\setup\models\ListViewSettingsForm;
use crudle\ext\accounts\models\base\BaseTransactionDocument;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Sales_Order".
 */
class SalesOrder extends BaseTransactionDocument
{
    const DOC_NUM_PREFIX = 'SO-';

    public $customer_phone;

    public function init()
    {
        // parent::init();
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
        return 'lgct_Sales_Order';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['customer_id'], 'required'],
            [[
                'customer_name', 'customer_phone', 'order_type', 'po_reference', 'pos_profile_id',
            ], 'string'],
            [['is_pos'], 'boolean'],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'id' => Yii::t('app', 'Order No.'),
            'po_reference' => Yii::t('app', "Customer's Purchase Order"),
            'po_date' => Yii::t('app', "Customer's PO date"),
            'customer_id' => Yii::t('app', 'Customer'),
            'customer_name' => Yii::t('app', 'Customer name'),
            'order_type' => Yii::t('app', 'Order type'),
            'is_return' => Yii::t('app', 'Is return (Credit note)'),
            'is_internal_customer' => Yii::t('app', 'Is internal customer'),
        ], $attributeLabels);
    }

    public static function relations()
    {
        return [
            'items'     => SalesOrderItem::class,
            'payments'  => SalesOrderPayment::class,
        ];
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }

    public function getItems()
    {
        return $this->hasMany(SalesOrderItem::class, ['sales_order_id' => 'id']);
    }

    public function getPayments()
    {
        return $this->hasMany(SalesOrderPayment::class, ['sales_order_id' => 'id']);
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
        $this->customer_phone = $this->customer->phone_number;

        return parent::afterFind();
    }
}
