<?php

namespace crudle\ext\sales\models;

use crudle\ext\accounts\models\base\BaseTransactionItem;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Sales_Order_Item".
 */
class SalesOrderItem extends BaseTransactionItem
{
    public static function tableName()
    {
        return 'lgct_Sales_Order_Item';
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

    public static function foreignKeyAttribute()
    {
        return 'sales_order_id';
    }
}
