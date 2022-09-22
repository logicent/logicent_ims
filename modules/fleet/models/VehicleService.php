<?php

namespace crudle\ext\fleet\models;

use crudle\app\main\models\ActiveRecord;
use Yii;

class VehicleService extends ActiveRecord
{
    public static function tableName()
    {
        return 'lgct_Vehicle_Service';
    }

    public function rules()
    {
        return [
            [['vehicle_id'], 'required'],            
            [['doc_status', 'idx'], 'integer'],
            [['expense_amount'], 'number'],
            [['parent_id', 'parent_field', 'parent_doctype', 'frequency', 'type', 'service_item'], 'string', 'max' => 140],
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
            'expense_amount' => Yii::t('app', 'Expense Amount'),
            'vehicle_id' => Yii::t('app', 'Vehicle'),
            'frequency' => Yii::t('app', 'Frequency'),
            'type' => Yii::t('app', 'Type'),
            'service_item' => Yii::t('app', 'Service Item'),
        ];
    }

    public function getVehicle()
    {
        return $this->hasOne(Vehicle::class, ['id' => 'vehicle_id']);
    }    
}
