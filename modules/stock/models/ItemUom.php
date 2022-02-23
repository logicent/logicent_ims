<?php

namespace logicent\stock\models;

use logicent\accounts\models\base\BaseSetupMasterData;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "item_uom".
 */
class ItemUom extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'item_uom';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['must_be_whole_number'], 'integer'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'must_be_whole_number' => Yii::t('app', 'Must be whole number'),
        ]);
    }
}
