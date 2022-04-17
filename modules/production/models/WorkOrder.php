<?php

namespace logicent\production\models;

use app\modules\main\models\base\BaseActiveRecord;
use Yii;

class WorkOrder extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'work_order';
    }

    public function rules()
    {
        return [
            [['issue_date', 'product_id', 'batch_no'], 'required'],
            [['issue_date', 'production_date', 'delivery_at'], 'safe'],
            [['product_qty', 'total_cost'], 'number'],
            [['shelf_life'], 'integer'],
            [['summary', 'delivery_instructions', 'notes', '_assign'], 'string'],
            [['reference', 'doc_status', 'product_id', 'customer_id', 'billing_address', 'delivery_address', 'authorized_by'], 'string', 'max' => 140],
            [['batch_no'], 'string', 'max' => 20],
            [['id'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'reference' => Yii::t('app', 'Sales Order'),
            'doc_status' => Yii::t('app', 'Doc Status'),
            'issue_date' => Yii::t('app', 'Issue Date'),
            'product_id' => Yii::t('app', 'Product ID'),
            'product_qty' => Yii::t('app', 'Product Qty'),
            'batch_no' => Yii::t('app', 'Batch No'),
            'production_date' => Yii::t('app', 'Production Date'),
            'shelf_life' => Yii::t('app', 'Shelf Life'),
            'total_cost' => Yii::t('app', 'Total Cost'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'billing_address' => Yii::t('app', 'Billing Address'),
            'summary' => Yii::t('app', 'Summary'),
            'delivery_at' => Yii::t('app', 'Delivery At'),
            'delivery_address' => Yii::t('app', 'Delivery Address'),
            'delivery_instructions' => Yii::t('app', 'Delivery Instructions'),
            'authorized_by' => Yii::t('app', 'Authorized By'),
            'notes' => Yii::t('app', 'Notes'),
            '_assign' => Yii::t('app', 'Assign'),
        ];
    }
}
