<?php

namespace logicent\stock\models;

use logicent\accounts\models\base\BaseTransactionDocument;
use Yii;
use yii\helpers\ArrayHelper;

class PurchaseReceipt extends BaseTransactionDocument
{
    // Goods Receipt
    // Goods Return?
    public static function tableName()
    {
        return 'purchase_receipt';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['set_posting_time', 'is_return'], 'integer'],
            [['lr_date', 'posting_time', 'posting_date', 'bill_date'], 'safe'],
            [['instructions', 'address_display', '_assign', 'contact_display', 'terms', 'contact_mobile', 
                'remarks', 'shipping_address_display', 'contact_email'], 'string'],
            [['taxes_and_charges_added', 'discount_amount', 'taxes_and_charges_deducted', 
                'additional_discount_percentage', 'total', 'grand_total', 'rounding_adjustment', 
                'total_taxes_and_charges', 'per_billed', 'total_net_weight', 'net_total'], 'number'],
            [['supplier_name', 'title', 'supplier_delivery_note', 'supplier_address', 'lr_no', 'supplier', 
                'buying_price_list', 'supplier_warehouse', 'apply_discount_on', 'range', 'contact_person', 
                'in_words', 'return_against', 'bill_no', 'tc_name', 'rejected_warehouse', 'is_subcontracted', 
                'company', 'language', 'shipping_address', 'naming_series', 'currency', 'letter_head', 
                'shipping_rule', 'status', 'taxes_and_charges', 'transporter_name'], 'string', 'max' => 140],
            [['id'], 'unique'],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'supplier_name' => Yii::t('app', 'Supplier Name'),
            'lr_date' => Yii::t('app', 'Lr Date'),
            'title' => Yii::t('app', 'Title'),
            'supplier_delivery_note' => Yii::t('app', 'Supplier Delivery Note'),
            'set_posting_time' => Yii::t('app', 'Set Posting Time'),
            'instructions' => Yii::t('app', 'Instructions'),
            'address_display' => Yii::t('app', 'Address Display'),
            '_assign' => Yii::t('app', 'Assign'),
            'taxes_and_charges_added' => Yii::t('app', 'Taxes And Charges Added'),
            'discount_amount' => Yii::t('app', 'Discount Amount'),
            'is_return' => Yii::t('app', 'Is Return'),
            'supplier_address' => Yii::t('app', 'Supplier Address'),
            'lr_no' => Yii::t('app', 'Lr No'),
            'contact_display' => Yii::t('app', 'Contact Display'),
            'supplier' => Yii::t('app', 'Supplier'),
            'buying_price_list' => Yii::t('app', 'Buying Price List'),
            'terms' => Yii::t('app', 'Terms'),
            'supplier_warehouse' => Yii::t('app', 'Supplier Warehouse'),
            'taxes_and_charges_deducted' => Yii::t('app', 'Taxes And Charges Deducted'),
            'apply_discount_on' => Yii::t('app', 'Apply Discount On'),
            'range' => Yii::t('app', 'Range'),
            'contact_person' => Yii::t('app', 'Contact Person'),
            'in_words' => Yii::t('app', 'In Words'),
            'additional_discount_percentage' => Yii::t('app', 'Additional Discount Percentage'),
            'return_against' => Yii::t('app', 'Return Against'),
            'contact_mobile' => Yii::t('app', 'Contact Mobile'),
            'posting_time' => Yii::t('app', 'Posting Time'),
            'total' => Yii::t('app', 'Total'),
            'bill_no' => Yii::t('app', 'Bill No'),
            'tc_name' => Yii::t('app', 'Tc Name'),
            'rejected_warehouse' => Yii::t('app', 'Rejected Warehouse'),
            'is_subcontracted' => Yii::t('app', 'Is Subcontracted'),
            'company' => Yii::t('app', 'Company'),
            'grand_total' => Yii::t('app', 'Grand Total'),
            'language' => Yii::t('app', 'Language'),
            'rounding_adjustment' => Yii::t('app', 'Rounding Adjustment'),
            'shipping_address' => Yii::t('app', 'Shipping Address'),
            'posting_date' => Yii::t('app', 'Posting Date'),
            'naming_series' => Yii::t('app', 'Naming Series'),
            'currency' => Yii::t('app', 'Currency'),
            'letter_head' => Yii::t('app', 'Letter Head'),
            'shipping_rule' => Yii::t('app', 'Shipping Rule'),
            'total_taxes_and_charges' => Yii::t('app', 'Total Taxes And Charges'),
            'bill_date' => Yii::t('app', 'Bill Date'),
            'status' => Yii::t('app', 'Status'),
            '_liked_by' => Yii::t('app', 'Liked By'),
            'taxes_and_charges' => Yii::t('app', 'Taxes And Charges'),
            'per_billed' => Yii::t('app', 'Per Billed'),
            'transporter_name' => Yii::t('app', 'Transporter Name'),
            'total_net_weight' => Yii::t('app', 'Total Net Weight'),
            'remarks' => Yii::t('app', 'Remarks'),
            'shipping_address_display' => Yii::t('app', 'Shipping Address Display'),
            'net_total' => Yii::t('app', 'Net Total'),
            'contact_email' => Yii::t('app', 'Contact Email'),
        ], $attributeLabels);
    }
}
