<?php

namespace crudle\ext\sales\models;

use crudle\ext\accounts\models\base\BaseTransactionPayment;
use crudle\ext\stock\models\Item;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Sales_Order_Payment".
 */
class SalesOrderPayment extends BaseTransactionPayment
{
    public static function tableName()
    {
        return 'lgct_Sales_Order_Payment';
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'sales_order_id' => Yii::t('app', 'Sales Order'),
        ], $attributeLabels);
    }

    public function getDocument()
    {
        return $this->hasOne(SalesOrder::class, ['id' => 'sales_order_id']);
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
        return 'sales_order_id';
    }
}
