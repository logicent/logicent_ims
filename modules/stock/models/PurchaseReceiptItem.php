<?php

namespace logicent\stock\models;

use app\modules\main\models\base\BaseActiveRecordDetail;
use Yii;

class PurchaseReceiptItem extends BaseActiveRecordDetail
{
    public static function tableName()
    {
        return 'purchase_receipt_item';
    }

    public function rules()
    {
        return [
            [['idx', 'retain_sample', 'allow_zero_valuation_rate', 'sample_quantity'], 'integer'],
            [['stock_qty', 'qty', 'rejected_qty', 'rate', 'total_weight', 'received_qty', 'rm_supp_cost', 'item_tax_amount', 'discount_percentage', 'net_rate', 'billed_amt', 'price_list_rate', 'weight_per_unit', 'amount', 'landed_cost_voucher_amount', 'valuation_rate', 'net_amount'], 'number'],
            [['image', 'item_tax_rate', 'serial_no', 'description', 'rejected_serial_no'], 'string'],
            [['schedule_date'], 'safe'],
            [['doc_status', 'parent_id', 'parent_field', 'parent_doctype', 'cost_center', 'barcode', 'quality_inspection', 'rejected_warehouse', 'item_name', 'purchase_order', 'stock_uom', 'warehouse', 'supplier_part_no', 'purchase_order_item', 'uom', 'brand', 'item_code', 'pricing_rule', 'batch_no', 'weight_uom', 'item_group', 'project', 'bom'], 'string', 'max' => 140],
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
            'idx' => Yii::t('app', 'Idx'),
            'stock_qty' => Yii::t('app', 'Stock Qty'),
            'image' => Yii::t('app', 'Image'),
            'qty' => Yii::t('app', 'Qty'),
            'rejected_qty' => Yii::t('app', 'Rejected Qty'),
            'item_tax_rate' => Yii::t('app', 'Item Tax Rate'),
            'rate' => Yii::t('app', 'Rate'),
            'total_weight' => Yii::t('app', 'Total Weight'),
            'cost_center' => Yii::t('app', 'Cost Center'),
            'received_qty' => Yii::t('app', 'Received Qty'),
            'rm_supp_cost' => Yii::t('app', 'Rm Supp Cost'),
            'barcode' => Yii::t('app', 'Barcode'),
            'item_tax_amount' => Yii::t('app', 'Item Tax Amount'),
            'quality_inspection' => Yii::t('app', 'Quality Inspection'),
            'schedule_date' => Yii::t('app', 'Schedule Date'),
            'rejected_warehouse' => Yii::t('app', 'Rejected Warehouse'),
            'discount_percentage' => Yii::t('app', 'Discount Percentage'),
            'item_name' => Yii::t('app', 'Item Name'),
            'purchase_order' => Yii::t('app', 'Purchase Order'),
            'net_rate' => Yii::t('app', 'Net Rate'),
            'stock_uom' => Yii::t('app', 'Stock Uom'),
            'warehouse' => Yii::t('app', 'Warehouse'),
            'billed_amt' => Yii::t('app', 'Billed Amt'),
            'supplier_part_no' => Yii::t('app', 'Supplier Part No'),
            'purchase_order_item' => Yii::t('app', 'Purchase Order Item'),
            'uom' => Yii::t('app', 'Uom'),
            'serial_no' => Yii::t('app', 'Serial No'),
            'description' => Yii::t('app', 'Description'),
            'brand' => Yii::t('app', 'Brand'),
            'rejected_serial_no' => Yii::t('app', 'Rejected Serial No'),
            'item_code' => Yii::t('app', 'Item Code'),
            'retain_sample' => Yii::t('app', 'Retain Sample'),
            'pricing_rule' => Yii::t('app', 'Pricing Rule'),
            'price_list_rate' => Yii::t('app', 'Price List Rate'),
            'batch_no' => Yii::t('app', 'Batch No'),
            'weight_uom' => Yii::t('app', 'Weight Uom'),
            'allow_zero_valuation_rate' => Yii::t('app', 'Allow Zero Valuation Rate'),
            'item_group' => Yii::t('app', 'Item Group'),
            'weight_per_unit' => Yii::t('app', 'Weight Per Unit'),
            'sample_quantity' => Yii::t('app', 'Sample Quantity'),
            'project' => Yii::t('app', 'Project'),
            'amount' => Yii::t('app', 'Amount'),
            'bom' => Yii::t('app', 'Bom'),
            'landed_cost_voucher_amount' => Yii::t('app', 'Landed Cost Voucher Amount'),
            'valuation_rate' => Yii::t('app', 'Valuation Rate'),
            'net_amount' => Yii::t('app', 'Net Amount'),
        ];
    }
}
