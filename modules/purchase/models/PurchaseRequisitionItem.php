<?php

namespace logicent\purchase\models;

use logicent\accounts\models\base\BaseTransactionItem;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "purchase_requisition_item".
 */
class PurchaseRequisitionItem extends BaseTransactionItem
{
    public static function tableName()
    {
        return 'purchase_requisition_item';
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

    public static function foreignKeyAttribute()
    {
        return 'purchase_order_id';
    }
}
