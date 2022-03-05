<?php

namespace app\models\hr;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii2tech\filedb\Query as FileDbQuery;

class Employee extends \app\models\DocType
{
    public $full_name;

    public static function tableName()
    {
        return 'employee';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['official_status'], 'integer'],
            [['firstname', 'surname', 'emp_type', 'identity_card'], 'required'],
            [['current_address', 'mailing_address', 'additional_info', 'job_history', 'status', 
                'reason_left'], 'string'],
            [['birth_date', 'hired_on', 'left_on'], 'safe'],
            [['firstname', 'surname', 'emp_type', 'tax_identifier', 'health_fund_id', 'social_security_id', 
                'identity_card', 'personal_email', 'company_email', 'mobile', 'designation'], 
                'string', 'max' => 140],
            [['emp_code', 'sex', 'blood_group'], 'string', 'max' => 20],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
           'firstname' => Yii::t('app', 'Firstname'),
           'surname' => Yii::t('app', 'Surname'),
           'emp_type' => Yii::t('app', 'Emp Type'),
           'tax_identifier' => Yii::t('app', 'Tax Identifier'),
           'health_fund_id' => Yii::t('app', 'Health Fund ID'),
           'social_security_id' => Yii::t('app', 'Social Security ID'),
           'identity_card' => Yii::t('app', 'Identity Card'),
           'emp_code' => Yii::t('app', 'Emp Code'),
           'current_address' => Yii::t('app', 'Current Address'),
           'mailing_address' => Yii::t('app', 'Mailing Address'),
           'personal_email' => Yii::t('app', 'Personal Email'),
           'company_email' => Yii::t('app', 'Company Email'),
           'mobile' => Yii::t('app', 'Mobile'),
           'designation' => Yii::t('app', 'Designation'),
           'birth_date' => Yii::t('app', 'Birth Date'),
           'sex' => Yii::t('app', 'Sex'),
           'blood_group' => Yii::t('app', 'Blood Group'),
           'additional_info' => Yii::t('app', 'Additional Info'),
           'job_history' => Yii::t('app', 'Job History'),
           'status' => Yii::t('app', 'Status'),
           'official_status' => Yii::t('app', 'Official Status'),
           'hired_on' => Yii::t('app', 'Hired On'),
           'left_on' => Yii::t('app', 'Left On'),
           'reason_left' => Yii::t('app', 'Reason Left'),
        ], $attributeLabels);
    }

    public static function getListOptions($show_inactive = false)
    {
        $employees = self::find()->select(['id', 'CONCAT(firstname, " ", surname) AS full_name'])
                                ->where(['status' => 'Active'])
                                ->asArray()
                                ->all();

        return ArrayHelper::map($employees, 'id', 'full_name');
    }

    public static function getEmpType()
    {
        $query = new FileDbQuery();
        $query->from('EmpType');
        $types = $query->all();
        
        return ArrayHelper::map($types, 'id', 'name');
    }

    public function getEmployeeAttendances()
    {
        return $this->hasMany(EmployeeAttendance::className(), ['employee_id' => 'id']);
    }

    public function getLeaveApplications()
    {
        return $this->hasMany(LeaveApplication::className(), ['employee_id' => 'id']);
    }

    public function getSalaryStructureEmployees()
    {
        return $this->hasMany(SalaryStructureEmployee::className(), ['employee_id' => 'id']);
    }

    public function statusLabel()
    {
        return $this->status;
    }

    public function afterFind()
    {
        $this->full_name = $this->firstname . ' ' . $this->surname;

        return parent::afterFind();
    }

}
