<?php

namespace crudle\ext\sales\models;

use crudle\ext\accounts\models\base\BaseTransactionItem;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Quotation_Item".
 */
class QuotationItem extends BaseTransactionItem
{
    public static function tableName()
    {
        return 'lgct_Quotation_Item';
    }

    public function getDocument()
    {
        return $this->hasOne(Quotation::class, ['id' => 'sales_quote_id']);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'sales_quote_id' => Yii::t('app', 'Sales Quote'),
        ], $attributeLabels);
    }

    public static function foreignKeyAttribute()
    {
        return 'sales_quote_id';
    }
}
