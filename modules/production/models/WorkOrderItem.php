<?php

namespace logicent\production\models;

use crudle\main\models\base\BaseActiveRecord;
use Yii;

class WorkOrderItem extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'work_order_item';
    }

    public function rules()
    {
        return [
            [['work_order_id', 'item_id', 'qty', 'total_cost'], 'required'],
            [['wastage_qty', 'wastage_cost', 'qty', 'unit_cost', 'labour_cost', 'total_cost'], 'number'],
            [['notes'], 'string'],
            [['status', 'work_order_id', 'item_id', 'description', 'account_id'], 'string', 'max' => 140],
        ];
    }

    public function attributeLabels()
    {
        return [
            'status' => Yii::t('app', 'Status'),
            'work_order_id' => Yii::t('app', 'Work Order'),
            'item_id' => Yii::t('app', 'Item'),
            'description' => Yii::t('app', 'Description'),
            'qty' => Yii::t('app', 'Qty'),
            'unit_cost' => Yii::t('app', 'Unit Cost'),
            'labour_cost' => Yii::t('app', 'Labour Cost'),
            'total_cost' => Yii::t('app', 'Total Cost'),
            'wastage_qty' => Yii::t('app', 'Wastage Qty'),
            'wastage_cost' => Yii::t('app', 'Wastage Cost'),
            'account_id' => Yii::t('app', 'Account'),
            'notes' => Yii::t('app', 'Notes'),
        ];
    }
}
