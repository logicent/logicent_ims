<?php

namespace app\models;

use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "stock_entry".
 */
class StockEntry extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'stock_entry';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['remarks'], 'string'],
            [['total_amount', 'total_quantity'], 'number'],
            [['from_warehouse', 'to_warehouse', 'amended_from', 'party', 'party_id', 'source_type',
                'source_id', 'title'], 'string', 'max' => 140],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'from_warehouse' => Yii::t('app', 'From warehouse'),
            'to_warehouse' => Yii::t('app', 'To warehouse'),
            'source_type' => Yii::t('app', 'Source type'),
            'source_id' => Yii::t('app', 'Source name'),
            'party_type' => Yii::t('app', 'Party type'),
            'party_id' => Yii::t('app', 'Party name'),
            'remarks' => Yii::t('app', 'Remarks'),
            'total_amount' => Yii::t('app', 'Total amount'),
            'total_quantity' => Yii::t('app', 'Total quantity'),
        ], $attributeLabels);
    }
}
