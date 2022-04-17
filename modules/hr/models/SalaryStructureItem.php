<?php

namespace logicent\hr\models;

use app\modules\main\models\base\BaseActiveRecord;
use Yii;

class SalaryStructureItem extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'salary_structure_item';
    }

    public function rules()
    {
        return [
            [['salary_structure', 'salary_component'], 'required'],
            [['salary_structure', 'salary_component'], 'integer'],
            [['condition', 'formula'], 'string'],
            [['amount'], 'number'],
            [['abbr', 'statistical_component'], 'string', 'max' => 140],
            [['do_not_include_in_total', 'amount_based_on_formula'], 'string', 'max' => 1],
            [['salary_structure'], 'exist', 'skipOnError' => true, 'targetClass' => SalaryStructure::class, 'targetAttribute' => ['salary_structure' => 'id']],
            [['salary_component'], 'exist', 'skipOnError' => true, 'targetClass' => SalaryComponent::class, 'targetAttribute' => ['salary_component' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'salary_structure' => Yii::t('app', 'Salary Structure'),
            'abbr' => Yii::t('app', 'Abbr'),
            'salary_component' => Yii::t('app', 'Salary Component'),
            'statistical_component' => Yii::t('app', 'Statistical Component'),
            'condition' => Yii::t('app', 'Condition'),
            'formula' => Yii::t('app', 'Formula'),
            'do_not_include_in_total' => Yii::t('app', 'Do Not Include In Total'),
            'amount' => Yii::t('app', 'Amount'),
            'amount_based_on_formula' => Yii::t('app', 'Amount Based On Formula'),
        ];
    }

    public function getSalaryStructure()
    {
        return $this->hasOne(SalaryStructure::class, ['id' => 'salary_structure']);
    }

    public function getSalaryComponent()
    {
        return $this->hasOne(SalaryComponent::class, ['id' => 'salary_component']);
    }
}
