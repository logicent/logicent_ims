<?php

namespace crudle\ext\hr\models;

use crudle\app\main\models\ActiveRecord;
use Yii;

class SalaryComponent extends ActiveRecord
{
    public static function tableName()
    {
        return 'lgct_Salary_Component';
    }

    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['description', 'type'], 'string'],
            [['code', 'name'], 'string', 'max' => 140],
            [['enabled'], 'string', 'max' => 1],
        ];
    }

    public function attributeLabels()
    {
        return [
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'type' => Yii::t('app', 'Type'),
            'enabled' => Yii::t('app', 'Enabled'),
        ];
    }

    public function getSalaryStructureItems()
    {
        return $this->hasMany(SalaryStructureItem::class, ['salary_component' => 'id']);
    }

    public function statusLabel()
    {
        return $this->enabled ? 'Enabled' : 'Disabled';
    }

}
