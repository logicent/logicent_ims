<?php

namespace app\models;

use app\models\base\BasePartyDocument;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "customer".
 */
class Customer extends BasePartyDocument
{
    const DOC_NUM_PREFIX = 'CUST-';

    public static function tableName()
    {
        return 'customer';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['customer_details', 'customer_group', 'customer_type'], 'string'],
            [['customer_pos_Id'], 'string', 'max' => 140],
            [['customer_group'], 'exist', 'skipOnError' => true, 
                'targetClass' => CustomerGroup::class, 'targetAttribute' => ['customer_group' => 'id']],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'lead_name'     => Yii::t('app', 'Lead name'),
            'customer_details'  => Yii::t('app', 'Customer details'),
            'customer_group'    => Yii::t('app', 'Customer group'),
            'customer_type'     => Yii::t('app', 'Customer type'),
            'customer_pos_Id'   => Yii::t('app', 'Customer POS ID'),
        ], $attributeLabels);
    }

    public function getCustomerGroup()
    {
        return $this->hasOne(CustomerGroup::class, ['id' => 'customer_group']);
    }

    public function getSalesQuote()
    {
        return $this->hasMany(SalesQuote::class, ['customer_id' => 'id']);
    }

    public function getSalesOrder()
    {
        return $this->hasMany(SalesOrder::class, ['customer_id' => 'id']);
    }

    public function getSalesInvoice()
    {
        return $this->hasMany(SalesInvoice::class, ['customer_id' => 'id']);
    }

    public function statusLabel()
    {
        return $this->inactive == '0' ? 'Active' : 'Inactive';
    }

    public function docNumPrefix()
    {
        return self::DOC_NUM_PREFIX;
    }
}
