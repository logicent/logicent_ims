<?php

namespace crudle\ext\hr\models;

use crudle\app\main\models\ActiveRecord;
use Yii;

class EmployeeTimesheet extends ActiveRecord
{
    public static function tableName()
    {
        return 'lgct_Employee_Timesheet';
    }

    public function rules()
    {
        return [
            [['employee_id', 'total_working_hours', 'total_billable_hours', 'total_billable_amount', 'total_costing_amount', 'status'], 'required'],
            [['employee_id'], 'integer'],
            [['total_working_hours', 'total_billable_hours', 'total_billable_amount', 'total_costing_amount'], 'number'],
            [['status', 'note'], 'string'],
            [['employee_name'], 'string', 'max' => 140],
        ];
    }

    public function attributeLabels()
    {
        return [
            'employee_id' => Yii::t('app', 'Employee'),
            'employee_name' => Yii::t('app', 'Employee Name'),
            'total_working_hours' => Yii::t('app', 'Total Working Hours'),
            'total_billable_hours' => Yii::t('app', 'Total Billable Hours'),
            'total_billable_amount' => Yii::t('app', 'Total Billable Amount'),
            'total_costing_amount' => Yii::t('app', 'Total Costing Amount'),
            'status' => Yii::t('app', 'Status'),
            'note' => Yii::t('app', 'Note'),
        ];
    }

    public function getEmployeeTimesheetItems()
    {
        return $this->hasMany(EmployeeTimesheetItem::class, ['employee_timesheet' => 'id']);
    }
}
