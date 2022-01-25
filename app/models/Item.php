<?php

namespace app\models;

use app\enums\Status_Active;
use app\models\base\AutoincrementIdInterface;
use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "item".
 *
 * @property ItemGroup $itemGroup
 */
class Item extends BaseActiveRecord implements AutoincrementIdInterface
{
    const DOC_NUM_PREFIX = 'ITEM-';

    public $status;

    public function init()
    {
        parent::init();
        $this->uploadForm = new UploadForm();
    }

    public static function tableName()
    {
        return 'item';
    }

    public function rules()
    {
        return [
            [[
                 'has_variants', 'is_sales_item', 'is_stock_item', 'is_purchase_item', 'inactive'
                ], 'boolean'],
            [[
                'net_weight', 'max_discount', 'min_order_qty', 'last_purchase_rate', 'opening_stock', 
                'qty_ordered', 'qty_in_stock', 'qty_reserved', 'qty_committed', 'standard_rate', 'tax_rate'
                ], 'number'],
            [['name'], 'required'],
            [[
                'name', 'item_type', 'weight_uom', 'item_uom', 'sales_uom', 'purchase_uom', 'description',
                'item_group', 'default_supplier', 'expense_account', 'income_account', 'brand_id', 'tax_code'
            ], 'string', 'max' => 140],
        ];
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Item code'),
            'name' => Yii::t('app', 'Item name'),
            'net_weight' => Yii::t('app', 'Net weight'),
            'max_discount' => Yii::t('app', 'Max. discount'),
            'item_group' => Yii::t('app', 'Item group'),
            'item_type' => Yii::t('app', 'Item type'),
            'has_variants' => Yii::t('app', 'Has variants'),
            'description' => Yii::t('app', 'Description'),
            'is_sales_item' => Yii::t('app', 'Is sales item'),
            'is_stock_item' => Yii::t('app', 'Is stock item'),
            'min_order_qty' => Yii::t('app', 'Min. order qty'),
            'image_path' => Yii::t('app', 'Image'),
            'last_purchase_rate' => Yii::t('app', 'Last purchase rate'),
            'is_purchase_item' => Yii::t('app', 'Is purchase item'),
            'weight_uom' => Yii::t('app', 'Weight uom'),
            'inactive' => Yii::t('app', 'Inactive'),
            'brand_id' => Yii::t('app', 'Brand'),
            'item_uom' => Yii::t('app', 'Item uom'),
            'sales_uom' => Yii::t('app', 'Sales uom'),
            'purchase_uom' => Yii::t('app', 'Purchase uom'),
            'opening_stock' => Yii::t('app', 'Opening stock'),
            'qty_ordered' => Yii::t('app', 'Qty ordered'),
            'qty_in_stock' => Yii::t('app', 'Qty in stock'),
            'qty_reserved' => Yii::t('app', 'Qty reserved'),
            'qty_committed' => Yii::t('app', 'Qty committed'),
            'standard_rate' => Yii::t('app', 'Standard rate'),
            'default_supplier' => Yii::t('app', 'Default supplier'),
            'expense_account' => Yii::t('app', 'Expense account'),
            'income_account' => Yii::t('app', 'Income account'),
            'tax_code' => Yii::t('app', 'Tax'),
            'tax_rate' => Yii::t('app', 'Tax rate'),
            'tax_account_id' => Yii::t('app', 'Tax account'),
        ]);
    }

    public static function enums()
    {
        return [
            'status' => Status_Active::class
        ];
    }

    public function getItemGroup()
    {
        return $this->hasOne(ItemGroup::class, ['id' => 'item_group']);
    }

    public function getDocumentItem($modelClass)
    {
        return $this->hasMany($modelClass, ['item_id' => 'id']);
    }

    public function docNumPrefix()
    {
        return self::DOC_NUM_PREFIX;
    }

    public function docNumPreset()
    {
        return $this->docNumPrefix() . str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert))
            return false;
        // else
        // if ($this->isNewRecord && empty($this->id))
        if ($this->isNewRecord)
            $this->id = $this->docNumPreset();

        return true;
    }

    public function afterSave($insert, $changedAttributes)
    {
        // Create item_warehouse entries for item
        if ($insert) {
            $warehouses = Warehouse::find()->where(['inactive' => false])->all();

            foreach ($warehouses as $warehouse) {
                $model = new ItemWarehouse();
                $model->item_id = $this->id;
                $model->warehouse_id = $warehouse->id;
                $model->save(false);
            }
        }

        return parent::afterSave($insert, $changedAttributes);
    }

    public function afterFind()
    {
        $this->status = $this->inactive;

        return parent::afterFind();
    }
}
