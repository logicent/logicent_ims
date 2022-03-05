<?php

namespace app\models\fleet;

use Yii;

class Vehicle extends \app\models\DocType
{
    public static function tableName()
    {
        return 'vehicle';
    }

    public function rules()
    {
        return [
            [['license_plate', 'last_odometer', 'doors', 'wheels'], 'required'],
            [['idx', 'last_odometer', 'doors', 'wheels'], 'integer'],
            [['acquisition_date', 'carbon_check_date', 'start_date', 'end_date'], 'safe'],
            [['vehicle_value'], 'number'],
            [['_assign'], 'string'],
            [['doc_status', 'parent_id', 'parent_field', 'parent_doctype', 'license_plate', 'policy_no', 'fuel_type', 'location', 'employee', 'uom', 'model', 'color', 'insurance_company', 'chassis_no', 'make'], 'string', 'max' => 140],
            [['license_plate'], 'unique'],
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
            'acquisition_date' => Yii::t('app', 'Acquisition Date'),
            'license_plate' => Yii::t('app', 'License Plate'),
            'carbon_check_date' => Yii::t('app', 'Carbon Check Date'),
            'last_odometer' => Yii::t('app', 'Last Odometer'),
            'policy_no' => Yii::t('app', 'Policy No'),
            'fuel_type' => Yii::t('app', 'Fuel Type'),
            'vehicle_value' => Yii::t('app', 'Vehicle Value'),
            'location' => Yii::t('app', 'Location'),
            'employee' => Yii::t('app', 'Employee'),
            'start_date' => Yii::t('app', 'Start Date'),
            'uom' => Yii::t('app', 'Uom'),
            'doors' => Yii::t('app', 'Doors'),
            'end_date' => Yii::t('app', 'End Date'),
            '_assign' => Yii::t('app', 'Assign'),
            'model' => Yii::t('app', 'Model'),
            'color' => Yii::t('app', 'Color'),
            'insurance_company' => Yii::t('app', 'Insurance Company'),
            'chassis_no' => Yii::t('app', 'Chassis No'),
            'wheels' => Yii::t('app', 'Wheels'),
            'make' => Yii::t('app', 'Make'),
        ];
    }

    public function getListOptions($filters = [])
    {
        $vehicles = self::find()->select(['id', 'license_plate'])
                                // ->where(['disabled' => false])
                                ->andWhere($filters)
                                ->asArray()
                                ->all();                                                    
        return \yii\helpers\ArrayHelper::map($vehicles, 'id', 'license_plate');
    }
    
}
