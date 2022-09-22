<?php

namespace crudle\ext\purchase\models;

use crudle\ext\accounts\enums\Type_Module;
use crudle\ext\accounts\enums\Type_Party;
use crudle\ext\accounts\models\base\BasePartyDocument;
use crudle\ext\accounts\models\PurchaseInvoice;
use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "supplier".
 */
class Supplier extends BasePartyDocument
{
    const DOC_NUM_PREFIX = 'SUPP-';
    // Allow Purchase Invoice Creation Without Purchase Order
    // Allow Purchase Invoice Creation Without Purchase Receipt

    public static function partyType()
    {
        return Type_Party::Supplier;
    }

    public static function moduleType()
    {
        return Type_Module::Buying;
    }

    public static function tableName()
    {
        return 'lgct_Supplier';
    }

    // public function rules()
    // {
    //     $rules = parent::rules();

    //     return ArrayHelper::merge([
    //     ], $rules);
    // }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'party_details' => Yii::t('app', 'Supplier details'),
            'party_type' => Yii::t('app', 'Supplier type'),
            'party_group' => Yii::t('app', 'Supplier group'),
        ], $attributeLabels);
    }

    public function getPurchaseOrder()
    {
        return $this->hasMany(PurchaseOrder::class, ['supplier_id' => 'id']);
    }

    public function getPurchaseInvoice()
    {
        return $this->hasMany(PurchaseInvoice::class, ['supplier_id' => 'id']);
    }

    public static function getListOptions($show_inactive = false)
    {
        $suppliers = self::find()->select(['id', 'name', 'phone_number'])
                                ->where(['disabled' => $show_inactive])
                                ->all();
        $listOptions = [];
        $supplier_name = $supplier_phone = '';

        foreach ($suppliers as $supplier)
        {
            $supplier_name = Html::tag('span', $supplier->name, ['class' => 'text']);
            $supplier_phone = Html::tag('span', $supplier->phone_number, ['class' => 'description']);

            $listOptions[$supplier->id] = $supplier_name . $supplier_phone;
        }

        return $listOptions;
    }

    public function docNumPrefix()
    {
        return self::DOC_NUM_PREFIX;
    }
}
