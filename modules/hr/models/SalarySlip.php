<?php

namespace logicent\hr\models;

use app\modules\main\models\base\BaseActiveRecord;
use Yii;

class SalarySlip extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'salary_slip';
    }

    public function rules()
    {
        return [
            [['salary_structure', 'employee_id'], 'required'],
            [['salary_structure', 'employee_id'], 'integer'],
            [['from_period', 'to_period'], 'safe'],
            [['working_days', 'hour_rate', 'leave_without_pay', 'payment_days', 'gross_pay', 'total_deduction', 'total_principal_amount', 'total_loan_repayment', 'total_interest_amount', 'net_pay', 'rounded_total', 'total_working_hours'], 'number'],
            [['employee_name', 'designation', 'company', 'branch', 'department', 'bank_name', 'bank_account_no'], 'string', 'max' => 140],
            [['has_timesheet'], 'string', 'max' => 1],
        ];
    }

    public function attributeLabels()
    {
        return [
            'salary_structure' => Yii::t('app', 'Salary Structure'),
            'employee_id' => Yii::t('app', 'Employee'),
            'employee_name' => Yii::t('app', 'Employee Name'),
            'designation' => Yii::t('app', 'Designation'),
            'company' => Yii::t('app', 'Company'),
            'branch' => Yii::t('app', 'Branch'),
            'department' => Yii::t('app', 'Department'),
            'from_period' => Yii::t('app', 'From Period'),
            'to_period' => Yii::t('app', 'To Period'),
            'working_days' => Yii::t('app', 'Working Days'),
            'hour_rate' => Yii::t('app', 'Hour Rate'),
            'leave_without_pay' => Yii::t('app', 'Leave Without Pay'),
            'payment_days' => Yii::t('app', 'Payment Days'),
            'gross_pay' => Yii::t('app', 'Gross Pay'),
            'total_deduction' => Yii::t('app', 'Total Deduction'),
            'total_principal_amount' => Yii::t('app', 'Total Principal Amount'),
            'total_loan_repayment' => Yii::t('app', 'Total Loan Repayment'),
            'total_interest_amount' => Yii::t('app', 'Total Interest Amount'),
            'net_pay' => Yii::t('app', 'Net Pay'),
            'rounded_total' => Yii::t('app', 'Rounded Total'),
            'total_working_hours' => Yii::t('app', 'Total Working Hours'),
            'bank_name' => Yii::t('app', 'Bank Name'),
            'bank_account_no' => Yii::t('app', 'Bank Account No'),
            'has_timesheet' => Yii::t('app', 'Has Timesheet'),
        ];
    }
}
