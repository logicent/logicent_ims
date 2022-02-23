<?php

namespace logicent\stock\models;

use logicent\accounts\models\base\BaseSetupMasterData;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "warehouse".
 */
class Warehouse extends BaseSetupMasterData
{
    public static function tableName()
    {
        return 'warehouse';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['parent_warehouse', 'email_address', 'branch', 'physical_address' ], 'string', 'max' => 140],
            ['is_group', 'boolean'],
            ['email_address', 'email'],
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'is_group' => Yii::t('app', 'Is group'),
            'parent_warehouse' => Yii::t('app', 'Parent warehouse'),
            'branch' => Yii::t('app', 'Branch'),
            'email_address' => Yii::t('app', 'Email address'),
            'physical_address' => Yii::t('app', 'Physical address'),
        ]);
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
