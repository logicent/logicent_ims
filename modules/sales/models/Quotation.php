<?php

namespace crudle\ext\sales\models;

use crudle\ext\accounts\enums\Type_Module;
use crudle\app\main\models\ActiveRecord;
use crudle\app\setup\models\ListViewSettingsForm;
use crudle\ext\accounts\models\base\BaseTransactionDocument;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Quotation".
 */
class Quotation extends BaseTransactionDocument
{
    const DOC_NUM_PREFIX = 'SQ-';
    
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
        return 'lgct_Quotation';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['customer_id'], 'required'],
            [['customer_name', 'customer_phone'], 'string'],
            ['valid_till', 'date']
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'id' => Yii::t('app', 'Quote No.'),
            'customer_id' => Yii::t('app', 'Customer'),
            'customer_name' => Yii::t('app', 'Customer name'),
            'valid_till' => Yii::t('app', 'Valid till'),
        ], $attributeLabels);
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }

    public function getItems()
    {
        return $this->hasMany(SalesQuoteItem::class, ['quotation_id' => 'id']);
    }

    public function getEmailAddress()
    {
        return $this->customer->email;
    }

    public function getName()
    {
        return $this->customer->name;
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

    // PostingInterface
    public function hasInventoryImpact()
    {
        return false;
    }

    public function hasAccountingImpact()
    {
        return false;
    }
}