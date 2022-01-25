<?php

namespace app\models\setup;

use app\models\base\BaseSettingsForm;
use Yii;

class DbBackupSettingsForm extends BaseSettingsForm
{
    public $file;
    public $useCompression;
    public $comments;
    public $keepBackupsFor;

    public function rules()
    {
        return [
            [['keepBackupsFor'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'keepBackupsFor' => Yii::t('app', 'Keep backups for'),
        ];
    }
}
