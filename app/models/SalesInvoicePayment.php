<?php

namespace app\models;

use app\models\base\BaseTransactionPayment;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sales_invoice_payment".
 *
 * @property GeneralLedger $account
 * @property GeneralLedger $taxCode
 */
class SalesInvoicePayment extends BaseTransactionPayment
{
    public static function tableName()
    {
        return 'sales_invoice_payment';
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
}
