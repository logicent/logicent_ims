<?php

namespace crudle\ext\accounts\models;

use crudle\ext\accounts\models\base\BaseTransactionItem;
use crudle\ext\stock\models\ItemWarehouse;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Purchase_Invoice_Item".
 */
class PurchaseInvoiceItem extends BaseTransactionItem
{
    public static function tableName()
    {
        return 'lgct_Purchase_Invoice_Item';
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

    public static function foreignKeyAttribute()
    {
        return 'purchase_invoice_id';
    }

    public function updateInventory()
    {
        // loop through item warehouse records and add/subtract quantities as needed
        $model = ItemWarehouse::findOne(['item_id' => $this->item_id, 'warehouse_id' => $this->warehouse_id]);
        $model->qty_in_stock = (double) $model->qty_in_stock + (double) $this->quantity;
        $model->save(false);
    }
}
