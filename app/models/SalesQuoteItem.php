<?php

namespace app\models;

use app\models\base\BaseTransactionItem;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sales_quote_item".
 */
class SalesQuoteItem extends BaseTransactionItem
{
    public static function tableName()
    {
        return 'sales_quote_item';
    }

    public function getDocument()
    {
        return $this->hasOne(SalesQuote::class, ['id' => 'sales_quote_id']);
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
