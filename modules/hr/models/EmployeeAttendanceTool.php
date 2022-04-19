<?php

namespace logicent\hr\models;

use Yii;

class EmployeeAttendanceTool extends \yii\base\Model
{
    public function rules()
    {
        return [
            [['employee_ids', 'workday'], 'required'],
            [['department', 'branch', 'company'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'employee_ids' => Yii::t('app', 'Employees'),
            'workday' => Yii::t('app', 'Workday'),
            'department' => Yii::t('app', 'Department'),
            'branch' => Yii::t('app', 'Branch'),
            'company' => Yii::t('app', 'Company'),
        ];
    }

}
