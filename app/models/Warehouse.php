<?php

namespace app\models;

use app\enums\Status_Active;
use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "warehouse".
 */
class Warehouse extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'warehouse';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['id'], 'required'],
            [['id'], 'unique'],
            [['inactive'], 'integer'],
            [[
                'email_address', 'branch', 'id', 'physical_address' ], 'string', 'max' => 140],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Name'),
            'branch' => Yii::t('app', 'Branch'),
            'inactive' => Yii::t('app', 'Inactive'),
            'email_address' => Yii::t('app', 'Email Address'),
            'physical_address' => Yii::t('app', 'Physical Address'),
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

    public function afterSave($insert, $changedAttributes)
    {
        // Create item_warehouse entries for items
        if ($insert) {
            $items = Item::find()->all();

            foreach ($items as $item) {
                $model = new ItemWarehouse();
                $model->item_id = $item->id;
                $model->warehouse_id = $this->id;
                $model->save(false);
            }
        }

        return parent::afterSave($insert, $changedAttributes);
    }
}
