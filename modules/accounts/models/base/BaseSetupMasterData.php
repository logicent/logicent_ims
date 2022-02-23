<?php

namespace logicent\accounts\models\base;

use app\enums\Status_Active;
use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "item_group".
 */
class BaseSetupMasterData extends BaseActiveRecord
{
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
            'inactive' => Status_Active::class
        ];
    }

    public static function autoSuggestIdValue()
    {
        return false;
    }
}
