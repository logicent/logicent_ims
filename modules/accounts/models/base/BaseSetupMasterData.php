<?php

namespace logicent\accounts\models\base;

use app\enums\Status_Active;
use app\modules\main\models\base\BaseActiveRecord;
use app\modules\setup\enums\Status_Transaction;
use app\modules\setup\models\ListViewSettingsForm;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the base model class for setup models.
 */
class BaseSetupMasterData extends BaseActiveRecord
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'id'; // override in view index
    }

    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'trim'],
            [['id'], 'string', 'max' => 140],
            [['id'], 'unique'],
            [['inactive'], 'boolean'],
            [['description'], 'string', 'max' => 280],
        ];
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Name'),
            'inactive' => Yii::t('app', 'Inactive'),
            'description' => Yii::t('app', 'Description'),
        ]);
    }

    public static function enums()
    {
        return [
            'status' => Status_Transaction::class,
            // 'inactive' => Status_Active::class
        ];
    }

    public static function autoSuggestIdValue()
    {
        return false;
    }
}
