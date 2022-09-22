<?php

namespace crudle\ext\hr\models;

use crudle\app\main\models\ActiveRecord;
use Yii;

class SalaryStructureEmployee extends ActiveRecord
{
    public static function tableName()
    {
        return 'salary_structure_employee';
    }

    public function rules()
    {
        return [
            [['salary_structure', 'employee_id'], 'required'],
            [['salary_structure', 'employee_id'], 'integer'],
            [['from_period', 'to_period'], 'safe'],
            [['base', 'variable'], 'number'],
            [['employee_name'], 'string', 'max' => 140],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['employee_id' => 'id']],
            [['salary_structure'], 'exist', 'skipOnError' => true, 'targetClass' => SalaryStructure::class, 'targetAttribute' => ['salary_structure' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'salary_structure' => Yii::t('app', 'Salary Structure'),
            'employee_id' => Yii::t('app', 'Employee'),
            'employee_name' => Yii::t('app', 'Employee Name'),
            'from_period' => Yii::t('app', 'From Period'),
            'to_period' => Yii::t('app', 'To Period'),
            'base' => Yii::t('app', 'Base'),
            'variable' => Yii::t('app', 'Variable'),
        ];
    }

    public function getEmployee()
    {
        return $this->hasOne(Employee::class, ['id' => 'employee_id']);
    }

    public function getSalaryStructure()
    {
        return $this->hasOne(SalaryStructure::class, ['id' => 'salary_structure']);
    }
}
