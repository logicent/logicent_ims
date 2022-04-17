<?php

namespace logicent\hr\models;

use app\modules\main\models\base\BaseActiveRecord;
use Yii;

class LeaveApplication extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'hr_leave_application';
    }

    public function rules()
    {
        return [
            [['employee_id', 'start_date', 'end_date', 'status', 'reason', 'leave_type'], 'required'],
            [['employee_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['status', 'reason', 'leave_type'], 'string'],
            [['employee_name'], 'string', 'max' => 140],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'employee_id' => Yii::t('app', 'Employee'),
            'employee_name' => Yii::t('app', 'Employee Name'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'status' => Yii::t('app', 'Status'),
            'reason' => Yii::t('app', 'Reason'),
            'leave_type' => Yii::t('app', 'Leave Type'),
        ];
    }

    public function getEmployee()
    {
        return $this->hasOne(Employee::class, ['id' => 'employee_id']);
    }
}
