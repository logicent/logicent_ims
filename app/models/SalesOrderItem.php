<?php

namespace app\models;

use app\models\base\BaseTransactionItem;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sales_order_item".
 */
class SalesOrderItem extends BaseTransactionItem
{
    public static function tableName()
    {
        return 'sales_order_item';
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
