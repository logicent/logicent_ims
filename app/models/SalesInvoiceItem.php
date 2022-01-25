<?php

namespace app\models;

use app\models\base\BaseTransactionItem;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sales_invoice_item".
 */
class SalesInvoiceItem extends BaseTransactionItem
{
    public static function tableName()
    {
        return 'sales_invoice_item';
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'sales_invoice_id' => Yii::t('app', 'Sales Invoice'),
        ], $attributeLabels);
    }

    public function getDocument()
    {
        return $this->hasOne(SalesInvoice::class, ['id' => 'sales_invoice_id']);
    }

    public static function foreignKeyAttribute()
    {
        return 'sales_invoice_id';
    }

    public function afterFind()
    {
        $this->item_name = $this->item->name;

        return parent::afterFind();
    }

    public function updateInventory()
    {
        // loop through item warehouse records and add/subtract quantities as needed
        $model = ItemWarehouse::findOne(['item_id' => $this->item_id, 'warehouse_id' => $this->warehouse_id]);
        $model->qty_in_stock = (double) $model->qty_in_stock - (double) $this->quantity;
        $model->save(false);
    }
}
