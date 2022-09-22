<?php

namespace crudle\ext\sales\models;

use crudle\ext\accounts\enums\Type_Module;
use crudle\ext\accounts\enums\Type_Party;
use crudle\ext\accounts\models\base\BasePartyDocument;
use crudle\ext\accounts\models\SalesInvoice;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Customer".
 */
class Customer extends BasePartyDocument
{
    const DOC_NUM_PREFIX = 'CUST-';

    public static function partyType()
    {
        return Type_Party::Customer;
    }

    public static function moduleType()
    {
        return Type_Module::Selling;
    }

    public static function tableName()
    {
        return 'lgct_Customer';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['customer_pos_Id'], 'string', 'max' => 140],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'lead_name'     => Yii::t('app', 'Lead name'),
            'party_details'  => Yii::t('app', 'Customer details'),
            'party_group'    => Yii::t('app', 'Customer group'),
            'party_type'     => Yii::t('app', 'Customer type'),
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

    public function docNumPrefix()
    {
        return self::DOC_NUM_PREFIX;
    }
}
