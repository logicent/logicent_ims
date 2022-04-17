<?php

namespace logicent\fleet\models;

use app\modules\main\models\base\BaseActiveRecord;
use Yii;

class VehicleLog extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'vehicle_log';
    }

    public function rules()
    {
        return [
            [['vehicle_id'], 'required'],
            [['doc_status', 'license_plate'], 'string', 'max' => 140],
            [['idx', 'odometer'], 'integer'],
            [['fuel_qty', 'unit_price'], 'number'],
            [['_assign'], 'string'],
            [['trip_date'], 'safe'],
            [['doc_status', 'parent_id', 'parent_field', 'parent_doctype', 'license_plate', 'reference', 'make', 'employee_id', 'supplier_id', 'model'], 'string', 'max' => 140],
            [['id'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'doc_status' => Yii::t('app', 'Doc Status'),
            'parent_id' => Yii::t('app', 'Parent'),
            'parent_field' => Yii::t('app', 'Parent Field'),
            'parent_doctype' => Yii::t('app', 'Parent Doctype'),
            'idx' => Yii::t('app', 'Idx'),
            'vehicle_id' => Yii::t('app', 'Vehicle'),
            'license_plate' => Yii::t('app', 'License Plate'),
            'reference' => Yii::t('app', 'Reference'),
            'fuel_qty' => Yii::t('app', 'Fuel Qty'),
            'make' => Yii::t('app', 'Make'),
            'odometer' => Yii::t('app', 'Odometer'),
            'employee_id' => Yii::t('app', 'Employee'),
            'unit_price' => Yii::t('app', 'Unit Price'),
            '_assign' => Yii::t('app', 'Assign'),
            'supplier_id' => Yii::t('app', 'Supplier'),
            'trip_date' => Yii::t('app', 'Trip Date'),
            'model' => Yii::t('app', 'Model'),
        ];
    }

    public function getVehicle()
    {
        return $this->hasOne(Vehicle::class, ['id' => 'vehicle_id']);
    }

}
