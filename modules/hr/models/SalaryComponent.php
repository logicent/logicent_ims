<?php

namespace logicent\hr\models;

use app\modules\main\models\base\BaseActiveRecord;
use Yii;

class SalaryComponent extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'salary_component';
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
