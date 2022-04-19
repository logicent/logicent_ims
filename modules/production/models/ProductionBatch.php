<?php

namespace logicent\production\models;

use crudle\main\models\base\BaseActiveRecord;
use Yii;

class ProductionBatch extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'production_batch';
    }

    public function rules()
    {
        return [
            [['name', 'item_made'], 'required'],
            [['mfg_date'], 'safe'],
            [['shelf_life'], 'integer'],
            [['note', '_assign'], 'string'],
            [['doc_status', 'name', 'parent_batch', 'ref_doctype', 'ref_id', 'item_made', 'supplier_id'], 'string', 'max' => 140],
            [['id'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'doc_status' => Yii::t('app', 'Status'),
            'name' => Yii::t('app', 'Batch No.'),
            'parent_batch' => Yii::t('app', 'Parent Batch'),
            'ref_doctype' => Yii::t('app', 'Ref Doctype'),
            'ref_id' => Yii::t('app', 'Ref ID'),
            'item_made' => Yii::t('app', 'Product Code'),
            'mfg_date' => Yii::t('app', 'Production Date'),
            'shelf_life' => Yii::t('app', 'Shelf Life'),
            'supplier_id' => Yii::t('app', 'Supplier ID'),
            'note' => Yii::t('app', 'Description'),
            '_assign' => Yii::t('app', 'Assign'),
        ];
    }
}
