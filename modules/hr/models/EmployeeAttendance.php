<?php

namespace crudle\ext\hr\models;

use crudle\app\main\models\ActiveRecord;
use Yii;

class EmployeeAttendance extends ActiveRecord
{
    public static function tableName()
    {
        return 'lgct_Employee_Attendance';
    }

    public function rules()
    {
        return [
            [['employee_id', 'workday', 'status'], 'required'],
            [['employee_id'], 'integer'],
            [['workday'], 'safe'],
            [['status'], 'string'],
            [['employee_name'], 'string', 'max' => 140],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'employee_id' => Yii::t('app', 'Employee'),
            'employee_name' => Yii::t('app', 'Employee Name'),
            'workday' => Yii::t('app', 'Workday'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public function getEmployee()
    {
        return $this->hasOne(Employee::class, ['id' => 'employee_id']);
    }
}
