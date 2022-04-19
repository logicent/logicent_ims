<?php

namespace logicent\accounts\models;

use crudle\main\models\base\BaseActiveRecord;

/**
 * This is the model class for table "currency".
 */
class Currency extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'currency';
    }

    // public function rules()
    // {
    //     $rules = parent::rules();

    //     return ArrayHelper::merge([
    //     ], $rules);
    // }

    // public function attributeLabels()
    // {
    //     $attributeLabels = parent::attributeLabels();

    //     return ArrayHelper::merge([
    //     ], $attributeLabels);
    // }

}
