<?php

namespace app\models\production;

use Yii;

class ProductionLine extends \app\models\DocType
{
    public static function tableName()
    {
        return 'production_line';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['note', '_assign'], 'string'],
            [['is_active'], 'string', 'max' => 1],
            [['name'], 'string', 'max' => 140],
            [['id'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'is_active' => Yii::t('app', 'Is Active'),
            'name' => Yii::t('app', 'Name'),
            'note' => Yii::t('app', 'Note'),
            '_assign' => Yii::t('app', 'Assign'),
        ];
    }

    public function lockUpdate()
    {
        return false;
    }

    public function lockDelete()
    {
        return true; // false if already linked
    }

    public function canDelete($status)
    {
        return true; // check user has permission
    }

    public function nextStatus()
    {
        return [];
    }

    public function statusLabel()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }
    
}
