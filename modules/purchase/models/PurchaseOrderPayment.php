<?php

namespace crudle\ext\purchase\models;

use crudle\ext\accounts\models\base\BaseTransactionPayment;
use crudle\ext\stock\models\Item;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "purchase_order_payment".
 */
class PurchaseOrderPayment extends BaseTransactionPayment
{
    public static function tableName()
    {
        return 'lgct_Purchase_Order_Payment';
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'purchase_order_id' => Yii::t('app', 'Purchase Order'),
        ], $attributeLabels);
    }

    public function getDocument()
    {
        return $this->hasOne(PurchaseOrder::class, ['id' => 'purchase_order_id']);
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
        return 'purchase_order_id';
    }
}
