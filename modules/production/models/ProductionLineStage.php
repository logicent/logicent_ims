<?php

namespace crudle\ext\production\models;

use crudle\app\main\models\ActiveRecord;
use Yii;

class ProductionLineStage extends ActiveRecord
{
    public static function tableName()
    {
        return 'lgct_Production_Line_Stage';
    }

    public function rules()
    {
        return [
            [['production_line_id'], 'required'],
            [['note', '_assign'], 'string'],
            [['production_line_id', 'production_stage_id', 'name', 'activity', 'capacity', 'setup_time', 'run_time'], 'string', 'max' => 140],
            [['is_active'], 'boolean'],
            [['id'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'production_line_id' => Yii::t('app', 'Production Line'),
            'production_stage_id' => Yii::t('app', 'Production Stage'),
            'is_active' => Yii::t('app', 'Is Active'),
            'name' => Yii::t('app', 'Name'),
            'activity' => Yii::t('app', 'Activity'),
            'capacity' => Yii::t('app', 'Capacity'),
            'setup_time' => Yii::t('app', 'Setup Time'),
            'run_time' => Yii::t('app', 'Run Time'),
            'note' => Yii::t('app', 'Note'),
            '_assign' => Yii::t('app', 'Assign'),
        ];
    }

    public function getStage()
    {
        return $this->hasOne(ProductionStage::class, ['id' => 'production_stage_id']);
    }
}
