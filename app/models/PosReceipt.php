<?php

namespace app\models;

use app\enums\Cart_Mode;
use app\enums\Status_Payment;
use app\enums\Status_Transaction;
use app\enums\Type_Relation;
use app\enums\Type_Sale;
use Yii;
use yii\helpers\ArrayHelper;


class PosReceipt extends SalesInvoice
{
    // public $posProfiles; // use in profileSwitcher dropdown list
    // public $activePosProfile; // choose from profileSwitcher or get default/first profile linked to cashier in `pos_profile` table
    public $posProfile;
    public $cartMode = Cart_Mode::Sales;
    public $saleType; // sales document/transaction type
    public $itemWarehouse; // itemSearch source location filter
    public $itemSearch; // item code, barcode, item name to search
    public $taxCharges; // sales taxes applicable for sale

    public $printReceipt = true;
    public $printDeliveryNote = false;
    public $printCreditNote = false;


    public function init()
    {
        /* $this->posProfiles = PosProfile::find()->where(['inactive' => false])
                                                ->joinWith('posProfileUser')
                                                ->all(); */
        /* $this->posProfile = PosProfile::find()->where(['inactive' => false])
                                        ->orWhere(['default' => true])
                                        ->joinWith('posProfileUser')
                                        ->first(); */
        $this->posProfile = Setup::getSettings( PosProfileForm::class );
        $this->taxCharges = TaxCharge::find()->where(['inactive' => false])->all();
    }

    public function rules()
    {
        return ArrayHelper::merge([
            ['customer_id', 'required', 'when' => function() {
                return $this->saleType == Type_Sale::CreditSale;
            }],
            [[
                // 'activePosProfile',
                'cartMode',
                'saleType',
                'itemWarehouse',
                'itemSearch',
            ], 'string'],
            [[
                'printReceipt', 'printDeliveryNote', 'printCreditNote'
            ], 'boolean']
        ], parent::rules());
    }

    public function attributeLabels()
    {
        return [
            // 'activePosProfile'  => Yii::t('app', 'Active profile'),
            'cartMode'      => Yii::t('app', 'Cart mode'),
            'saleType'      => Yii::t('app', 'Sale type'),
            'itemWarehouse' => Yii::t('app', 'Warehouse'),
            'itemSearch'    => Yii::t('app', 'Item search'),
            // 'printReceipt'      => Yii::t('app', 'Print receipt'),
            // 'printDeliveryNote' => Yii::t('app', 'Print delivery note'),
            // 'printCreditNote' => Yii::t('app', 'Print credit note'),
        ];
    }

    public static function relations()
    {
        return [
            'items'     => [
                'class' => PosReceiptItem::class,
                'type' => Type_Relation::ChildModel
            ],
            'payments'  => [
                'class' => PosReceiptPayment::class,
                'type' => Type_Relation::ChildModel
            ],
            // 'invoice'  => [
            //     'class' => SalesInvoice::class,
            //     'type' => Type_Relation::SiblingModel
            // ],
        ];
    }

    public function docNumPrefix()
    {
        return self::DOC_NUM_PREFIX;
    }

    // PostingInterface
    public function hasInventoryImpact()
    {
        return $this->getItems->count() > 0;
    }

    public function updateInventory()
    {
        // loop through items and add to each warehouse quantity
        if ((bool) $this->update_stock && $this->hasInventoryImpact())
        {}
    }

    public function hasAccountingImpact()
    {
        return $this->getPayments->count() > 0;
    }

    public function updateAccounting()
    {
        // loop through payments and add to legder/party accounts
    }

    // public function beforeSave($insert)
    // {
    //     if (!parent::beforeSave($insert))
    //         return false;
    //     // else

    //     return true;
    // }

    // public function afterSave($insert, $changedAttributes)
    // {
    //     return parent::afterSave($insert, $changedAttributes);
    // }

    public static function getSaleLabelsBy($saleType)
    {
        return [
            'fieldSaleTypeValue' => Type_Sale::enums()[$saleType],
            'cartSummaryHeaderColor' => Type_Sale::enumsColor()[$saleType],
            'cartSummaryHeaderLabel' => strtoupper(Type_Sale::enumsHeaderLabel()[$saleType]),
            'submitButtonColor' => Type_Sale::enumsColor()[$saleType],
            'submitButtonLabel' => Type_Sale::enumsButtonLabel()[$saleType],
        ];
    }

    public static function getSaleValuesBy($saleType)
    {
        switch ($saleType) {
            case Type_Sale::CashSale:
                return [
                    'beforeChange' => [
                        'setCustomerAsRequired'   => "function() {
                            return $('.ui.red.pointing.label').remove();
                        }",
                    ],
                    'values' => [
                        'is_pos'        => 1, // true
                        'update_stock'  => 1, // true
                        'status'        => Status_Transaction::Submitted, // later Submit
                        'paid_status'   => Status_Payment::Paid, // later Unpaid
                        'printReceipt'  => true,
                        'printDeliveryNote' => false,
                        'printCreditNote' => false,
                    ],
                    'afterChange' => [
                        'checkPaidAmountValue' => "function() {
                            return $('#paid_amount').val() == $('#total_amount').val()
                        }",
                        // overpayment is change_amount
                        'calculateChangeAmount' => "function() {
                            return $('#change_amount').val() = $('#paid_amount').val() - $('#total_amount').val();
                        }"
                    ]
                ];
            case Type_Sale::CreditSale:
                return [
                    'beforeChange' => [
                        'setCustomerAsRequired'   => "function() {
                            return $('.field-pos__customer_id > .ui.dropdown').insertAfter('<div class='ui red pointing label'></div>');
                        }",
                    ],
                    // default 30 days in profile or use Customer credit_days
                    'due_date'   => "function() {
                        var date = new Date(); // Now
                        date.setDate(date.getDate() + 30); // Set now + 30 days as the new date
                        return $('#due_date').val(date);
                    }",
                    'values' => [
                        'is_pos'        => 0, // false
                        'update_stock'  => 1, // true
                        'status'        => Status_Transaction::Submitted,
                        'paid_status'   => Status_Payment::Unpaid,
                        'printReceipt'  => false,
                        'printDeliveryNote' => true,
                        'printCreditNote' => false,
                    ],
                    'afterChange' => [
                        'checkPartialPaidAmountValue' => "function() {
                            return $('#paid_amount').val() < $('#total_amount').val();
                        }",
                        // if full credit sale
                        'checkPaidAmountValue' => "function() {
                            return $('#paid_amount').val() == 0
                        }",
                        // overpayment is credited to customer account
                        'calculateBalanceAmount' => "function() {
                            return $('#balance_amount').val() = $('#total_amount').val() - $('#paid_amount').val();
                        }"
                    ]
                ];
            case Type_Sale::ReturnSale:
                return [
                    'values' => [
                        'is_return'     => 1, // true
                        'is_pos'        => 0, // false
                        'update_stock'  => 1, // true - reverse the stock quantities
                        'status'        => Status_Transaction::Submitted,
                        'paid_status'   => Status_Payment::Unpaid,
                        'printReceipt'  => false,
                        'printDeliveryNote' => false,
                        'printCreditNote' => true,
                    ],
                    'afterChange' => [
                        'calculateBalanceAmount' => "function() {
                            return $('#balance_amount').val() = Math.abs($('#total_amount').val()) * -1;
                        }"
                    ]
                ];
            default:
        }
    }
}
