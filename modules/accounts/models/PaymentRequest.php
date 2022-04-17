<?php

namespace logicent\accounts\models;

use app\modules\main\models\base\BaseActiveRecord;

/**
 * This is the model class for table "payment_request".
 */
class PaymentRequest extends BaseActiveRecord
{
    // (Unpaid Invoices)
    // send reminder to Customer
    public static function tableName()
    {
        return 'payment_request';
    }
}
