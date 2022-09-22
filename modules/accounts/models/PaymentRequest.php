<?php

namespace crudle\ext\accounts\models;

use crudle\app\main\models\ActiveRecord;

/**
 * This is the model class for table "Payment_Request".
 */
class PaymentRequest extends ActiveRecord
{
    // (Unpaid Invoices)
    // send reminder to Customer
    public static function tableName()
    {
        return 'lgct_Payment_Request';
    }
}
