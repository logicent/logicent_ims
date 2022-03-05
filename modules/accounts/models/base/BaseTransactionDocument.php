<?php

namespace logicent\accounts\models\base;

use app\enums\Status_Transaction;
use app\enums\Type_Permission;
use app\models\base\AutoincrementIdInterface;
use app\models\base\BaseActiveRecord;
use app\modules\setup\models\ListViewSettingsForm;
use Yii;
use yii\helpers\ArrayHelper;

abstract class BaseTransactionDocument extends BaseActiveRecord implements PostingInterface, AutoincrementIdInterface
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'id'; // override in view index
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            ['id', 'unique'],
            ['status', 'default', 'value' => Status_Transaction::Draft],
            [['status', 'posting_date'], 'required'],
            [['update_stock', 'amounts_tax_inclusive'], 'boolean'],
            ['total_quantity', 'integer'],
            [['title', 'amended_from', 'authorized_by'], 'string', 'max' => 140],
            [[
                'paid_status', 'status', 'currency', 'price_list_id', 'total_in_words',
                'terms', 'notes'
            ], 'string'],
            [[
                'net_total', 'change_amount', 'deposit_amount', 'paid_amount', 'balance_amount',
                'total_amount', 'tax_amount', 'rounding_adjustment', 'rounded_total'
            ], 'default', 'value' => '0.00'],
            [['posting_date'], 'datetime', 'format' => 'php:Y-m-d'],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'title' => Yii::t('app', 'Title'),
            'branch_id' => Yii::t('app', 'Branch'),
            'posting_date' => Yii::t('app', 'Issue date'),
            'is_return' => Yii::t('app', 'Is return'),
            'is_debit_note' => Yii::t('app', 'Is debit note'),
            'return_against' => Yii::t('app', 'Return against'),
            'amended_from' => Yii::t('app', 'Amended from'),
            'is_discounted' => Yii::t('app', 'Is discounted'),
            'status' => Yii::t('app', 'Status'),
            'currency' => Yii::t('app', 'Currency'),
            'price_list_id' => Yii::t('app', 'Price list'),
            'billing_address' => Yii::t('app', 'Billing address'),
            'update_stock' => Yii::t('app', 'Update stock'),
            'authorized_by' => Yii::t('app', 'Authorized by'),
            'amounts_tax_inclusive' => Yii::t('app', 'Amounts tax inclusive'),
            'total_quantity' => Yii::t('app', 'Total quantity'),
            'discount_amount' => Yii::t('app', 'Discount amount'),
            'discount_percent' => Yii::t('app', 'Discount percent'),
            'change_amount' => Yii::t('app', 'Change amount'),
            'deposit_amount' => Yii::t('app', 'Deposit amount'),
            'net_total' => Yii::t('app', 'Net total'),
            'tax_amount' => Yii::t('app', 'Tax amount'),
            'tax_percent' => Yii::t('app', 'Tax percent'),
            'paid_amount' => Yii::t('app', 'Paid amount'),
            'paid_status' => Yii::t('app', 'Paid status'),
            'balance_amount' => Yii::t('app', 'Balance amount'),
            'total_amount' => Yii::t('app', 'Total amount'),
            'rounding_adjustment' => Yii::t('app', 'Rounding adjustment'),
            'rounded_total' => Yii::t('app', 'Rounded total'),
            'terms' => Yii::t('app', 'Terms'),
            'notes' => Yii::t('app', 'Notes'),
        ], $attributeLabels);
    }

    public function docNumPrefix()
    {
    }

    public function docNumPreset()
    {
        return $this->docNumPrefix() . str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

    public static function enums()
    {
        return [
            'status' => Status_Transaction::class
        ];
    }

    // Workflow Interface
    public function hasWorkflow()
    {
        return true;
    }

    public function lockUpdate()
    {
        return  $this->status == Status_Transaction::Submitted ||
                $this->status == Status_Transaction::Canceled ||
                $this->status == Status_Transaction::Closed;
    }

    public function lockDelete()
    {
        return $this->status !== Status_Transaction::Canceled;
    }

    public function lockPayment()
    {
        return  $this->status === Status_Transaction::Closed || 
                $this->status === Status_Transaction::Canceled ||
                ($this->status === Status_Transaction::Submitted && (int) $this->unpaid_balance == 0);
    }

    public function nextStatus()
    {
        $statuses = Status_Transaction::enums();
        $filtered_statuses = [];

        switch ($this->status) {
            case Status_Transaction::Draft:
                return [
                    Status_Transaction::Submit,
                ];
                break;
            case Status_Transaction::Submitted:
                return [
                    Status_Transaction::Canceled,
                ];
                break;
            default:
        }
        return array_diff($statuses, $filtered_statuses);
    }

    public static function permissions()
    {
        return Type_Permission::enums();
    }

    public static function listLinkAttribute()
    {
        return 'name';
    }

    public function duplicateChildRelations()
    {
        return [];
    }

    // PostingInterface
    public function hasInventoryImpact()
    {
        return (bool) $this->update_stock == true;
    }

    public function updateInventory()
    {
    }

    public function hasAccountingImpact()
    {
        return true;
    }

    public function updateAccounting()
    {
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert))
            return false;
        // else
        if ($this->isNewRecord)
            $this->id = $this->docNumPreset();

        return true;
    }

    public function getReturnAgainstListOptions()
    {
        return self::find()->where(['is_return' => false, 'status' => Status_Transaction::Submitted]);
    }
}
