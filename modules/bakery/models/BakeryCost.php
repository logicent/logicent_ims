<?php

namespace app\models;

use Yii;

class BakeryCost extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'bakery_cost';
    }

    public function rules()
    {
        return [
            [['baked_good_id'], 'required'],
            [['baked_good_id', 'ingredient_cost'], 'integer'],
            [['baking_cost', 'icing_cost', 'utility_cost', 'admin_cost'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'string', 'max' => 20],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'baked_good_id' => Yii::t('app', 'Baked Good ID'),
            'ingredient_cost' => Yii::t('app', 'Ingredient Cost'),
            'baking_cost' => Yii::t('app', 'Baking Cost'),
            'icing_cost' => Yii::t('app', 'Icing Cost'),
            'utility_cost' => Yii::t('app', 'Utility Cost'),
            'admin_cost' => Yii::t('app', 'Admin Cost'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
