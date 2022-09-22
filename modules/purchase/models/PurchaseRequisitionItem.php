<?php

namespace crudle\ext\purchase\models;

use crudle\ext\accounts\models\base\BaseTransactionItem;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "purchase_requisition_item".
 */
class PurchaseRequisitionItem extends BaseTransactionItem
{
    public static function tableName()
    {
        return 'lgct_Purchase_Requisition_Item';
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
