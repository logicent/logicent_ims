<?php

namespace crudle\ext\production\models;

use crudle\app\main\models\ActiveRecord;
use Yii;

class ProductionStage extends ActiveRecord
{
    public static function tableName()
    {
        return 'lgct_Production_Stage';
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

    public static function getListOptions($show_inactive = false)
    {
        $stages = self::find()->select(['id', 'name'])
                                ->where(['is_active' => !$show_inactive])
                                ->asArray()
                                ->all();
        return \yii\helpers\ArrayHelper::map($stages, 'id', 'name');
    }

    public function statusLabel()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }

}
