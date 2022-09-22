<?php

namespace crudle\ext\accounts\models\base;

use crudle\app\enums\Status_Active;
use crudle\app\setup\enums\Status_Transaction;
use crudle\app\setup\models\ListViewSettingsForm;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the base model class for setup models.
 */
class BaseSetupMasterData extends \crudle\app\main\models\ActiveRecord
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
            'status' => [
                'class' => Status_Active::class,
                'attribute' => 'inactive',
            ],
        ];
    }

    public static function autoSuggestIdValue()
    {
        return false;
    }
}
