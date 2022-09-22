<?php

namespace app\models\accounts;

use crudle\ext\accounts\models\base\BaseTransactionDocument;
use Yii;

class PaymentEntry extends BaseTransactionDocument
{
    // (Incoming/Outgoing)
    // Sales/Purchase Invoice Payment
    public static function tableName()
    {
        return 'lgct_Payment_Entry';
    }

    public function rules()
    {
        return [
            [['doc_status', '_assign', 'remarks'], 'string'],
            [['base_paid_amount', 'unallocated_amount', 'target_exchange_rate', 'total_allocated_amount', 'base_total_allocated_amount', 'base_received_amount', 'source_exchange_rate', 'party_balance', 'paid_from_account_balance', 'paid_to_account_balance', 'paid_amount', 'received_amount', 'difference_amount'], 'number'],
            [['reference_date', 'clearance_date', 'posting_date'], 'safe'],
            [['allocate_payment_amount'], 'integer'],
            [['parent_id', 'parent_field', 'parent_doctype', 'naming_series', 'reference_no', 'paid_to', 'mode_of_payment', 'title', 'party_type', 'amended_from', 'party', 'company', 'paid_from', 'party_name', 'subscription', 'paid_to_account_currency', 'paid_from_account_currency', 'project', 'payment_type'], 'string', 'max' => 140],
            [['id'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'doc_status' => Yii::t('app', 'Doc Status'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'parent_field' => Yii::t('app', 'Parent Field'),
            'parent_doctype' => Yii::t('app', 'Parent Doctype'),
            'naming_series' => Yii::t('app', 'Naming Series'),
            'reference_no' => Yii::t('app', 'Reference No'),
            'paid_to' => Yii::t('app', 'Paid To'),
            'base_paid_amount' => Yii::t('app', 'Base Paid Amount'),
            'reference_date' => Yii::t('app', 'Reference Date'),
            'unallocated_amount' => Yii::t('app', 'Unallocated Amount'),
            'allocate_payment_amount' => Yii::t('app', 'Allocate Payment Amount'),
            'mode_of_payment' => Yii::t('app', 'Mode Of Payment'),
            'target_exchange_rate' => Yii::t('app', 'Target Exchange Rate'),
            'title' => Yii::t('app', 'Title'),
            'party_type' => Yii::t('app', 'Party Type'),
            'total_allocated_amount' => Yii::t('app', 'Total Allocated Amount'),
            'amended_from' => Yii::t('app', 'Amended From'),
            'base_total_allocated_amount' => Yii::t('app', 'Base Total Allocated Amount'),
            'party' => Yii::t('app', 'Party'),
            'base_received_amount' => Yii::t('app', 'Base Received Amount'),
            'source_exchange_rate' => Yii::t('app', 'Source Exchange Rate'),
            'clearance_date' => Yii::t('app', 'Clearance Date'),
            'company' => Yii::t('app', 'Company'),
            '_assign' => Yii::t('app', 'Assign'),
            'paid_from' => Yii::t('app', 'Paid From'),
            'party_balance' => Yii::t('app', 'Party Balance'),
            'party_name' => Yii::t('app', 'Party Name'),
            'remarks' => Yii::t('app', 'Remarks'),
            'subscription' => Yii::t('app', 'Subscription'),
            'paid_to_account_currency' => Yii::t('app', 'Paid To Account Currency'),
            'paid_from_account_balance' => Yii::t('app', 'Paid From Account Balance'),
            'paid_from_account_currency' => Yii::t('app', 'Paid From Account Currency'),
            'paid_to_account_balance' => Yii::t('app', 'Paid To Account Balance'),
            'paid_amount' => Yii::t('app', 'Paid Amount'),
            'received_amount' => Yii::t('app', 'Received Amount'),
            'project' => Yii::t('app', 'Project'),
            'payment_type' => Yii::t('app', 'Payment Type'),
            'difference_amount' => Yii::t('app', 'Difference Amount'),
            'posting_date' => Yii::t('app', 'Posting Date'),
        ];
    }
}
