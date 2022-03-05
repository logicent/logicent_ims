<?php

namespace logicent\accounts\models;

use logicent\accounts\models\base\BaseTransactionItem;
use logicent\stock\models\ItemWarehouse;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "purchase_invoice_item".
 */
class PurchaseInvoiceItem extends BaseTransactionItem
{
    public static function tableName()
    {
        return 'purchase_invoice_item';
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
