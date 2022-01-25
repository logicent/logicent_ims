<?php

namespace app\models\setup;

use Yii;

class ReportAutoEmail extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'report_auto_email';
    }

    public function rules()
    {
        return [
            [['name', 'created_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 140],
            [['created_by', 'updated_by'], 'string', 'max' => 20],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
