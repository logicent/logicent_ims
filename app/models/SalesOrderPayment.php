<?php

namespace app\models;

use app\models\base\BaseTransactionPayment;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sales_order_payment".
 */
class SalesOrderPayment extends BaseTransactionPayment
{
    public static function tableName()
    {
        return 'sales_order_payment';
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
