<?php

namespace crudle\ext\accounts\models;

use crudle\app\main\models\ActiveRecord;

/**
 * This is the model class for table "Currency".
 */
class Currency extends ActiveRecord
{
    public static function tableName()
    {
        return 'lgct_Currency';
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
