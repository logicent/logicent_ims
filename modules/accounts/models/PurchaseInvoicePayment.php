<?php

namespace crudle\ext\accounts\models;

use crudle\app\main\models\ActiveRecord;
use crudle\ext\stock\models\Item;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Purchase_Invoice_Payment".
 */
class PurchaseInvoicePayment extends ActiveRecord
{
    public static function tableName()
    {
        return 'lgct_Purchase_Invoice_Payment';
    }

    public function rules()
    {
        return [
            [['paid_at', 'paid_amount'], 'required'],
            [['account_id'], 'integer'],
            [['reference', 'doc_status', 'mode_of_payment'], 'string'],
            [['paid_amount', 'tax_rate', 'discount_amount', 'discount_percent', 'tax_amount'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'purchase_invoice_id' => Yii::t('app', 'Purchase Invoice'),
        ], $attributeLabels);
    }

    public function getDocument()
    {
        return $this->hasOne(PurchaseInvoice::class, ['id' => 'purchase_invoice_id']);
    }

    public function getItem()
    {
        return $this->hasOne(Item::class, ['id' => 'item_id']);
    }

    public function getItemName()
    {
        return Item::findOne($this->item_id)->name;
    }

    public static function foreignKeyAttribute()
    {
        return 'purchase_invoice_id';
    }
}
