<?php

namespace logicent\hr\models;

use crudle\main\models\base\BaseActiveRecord;
use Yii;

class SalaryStructure extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'salary_structure';
    }

    public function rules()
    {
        return [
            [['name', 'mode_of_payment'], 'required'],
            [['description', 'payroll_frequency'], 'string'],
            [['ts_salary_component'], 'integer'],
            [['hour_rate', 'total_earning', 'total_deduction', 'net_pay'], 'number'],
            [['code', 'name', 'mode_of_payment', 'payment_account'], 'string', 'max' => 140],
            [['enabled', 'is_default', 'use_timesheet'], 'string', 'max' => 1],
        ];
    }

    public function attributeLabels()
    {
        return [
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'enabled' => Yii::t('app', 'Enabled'),
            'is_default' => Yii::t('app', 'Is Default'),
            'payroll_frequency' => Yii::t('app', 'Payroll Frequency'),
            'use_timesheet' => Yii::t('app', 'Use Timesheet'),
            'ts_salary_component' => Yii::t('app', 'Timesheet Salary Component'),
            'hour_rate' => Yii::t('app', 'Hour Rate'),
            'total_earning' => Yii::t('app', 'Total Earning'),
            'total_deduction' => Yii::t('app', 'Total Deduction'),
            'net_pay' => Yii::t('app', 'Net Pay'),
            'mode_of_payment' => Yii::t('app', 'Mode Of Payment'),
            'payment_account' => Yii::t('app', 'Payment Account'),
        ];
    }

    public function getPayrollEntries()
    {
        return $this->hasMany(PayrollEntry::class, ['salary_structure' => 'id']);
    }

    public function getSalaryStructureEmployees()
    {
        return $this->hasMany(SalaryStructureEmployee::class, ['salary_structure' => 'id']);
    }

    public function getSalaryStructureItems()
    {
        return $this->hasMany(SalaryStructureItem::class, ['salary_structure' => 'id']);
    }

    public function statusLabel()
    {
        return $this->enabled ? 'Enabled' : 'Disabled';
    }

}
