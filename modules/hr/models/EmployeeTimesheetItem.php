<?php

namespace crudle\ext\hr\models;

use crudle\app\main\models\ActiveRecord;
use Yii;

class EmployeeTimesheetItem extends ActiveRecord
{
    public static function tableName()
    {
        return 'employee_timesheet_item';
    }

    public function rules()
    {
        return [
            [['employee_timesheet', 'activity_type', 'actual_hours'], 'required'],
            [['employee_timesheet'], 'integer'],
            [['from_time', 'to_time'], 'safe'],
            [['expected_hours', 'actual_hours', 'billable_hours', 'billing_rate', 'billed_amount', 'costing_rate', 'costing_amount'], 'number'],
            [['activity_type'], 'string', 'max' => 140],
            [['completed', 'billable'], 'string', 'max' => 1],
            [['employee_timesheet'], 'exist', 'skipOnError' => true, 'targetClass' => EmployeeTimesheet::class, 'targetAttribute' => ['employee_timesheet' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'employee_timesheet' => Yii::t('app', 'Employee Timesheet'),
            'activity_type' => Yii::t('app', 'Activity Type'),
            'from_time' => Yii::t('app', 'From Time'),
            'to_time' => Yii::t('app', 'To Time'),
            'completed' => Yii::t('app', 'Completed'),
            'expected_hours' => Yii::t('app', 'Expected Hours'),
            'actual_hours' => Yii::t('app', 'Actual Hours'),
            'billable' => Yii::t('app', 'Billable'),
            'billable_hours' => Yii::t('app', 'Billable Hours'),
            'billing_rate' => Yii::t('app', 'Billing Rate'),
            'billed_amount' => Yii::t('app', 'Billed Amount'),
            'costing_rate' => Yii::t('app', 'Costing Rate'),
            'costing_amount' => Yii::t('app', 'Costing Amount'),
        ];
    }

    public function getEmployeeTimesheet()
    {
        return $this->hasOne(EmployeeTimesheet::class, ['id' => 'employee_timesheet']);
    }
}
