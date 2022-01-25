<?php

namespace app\models;

use app\models\base\BasePartyDocument;
use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "supplier".
 */
class Supplier extends BasePartyDocument
{
    const DOC_NUM_PREFIX = 'SUPP-';

    public static function tableName()
    {
        return 'supplier';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['supplier_details', 'supplier_type'], 'string'],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'supplier_details' => Yii::t('app', 'Supplier Details'),
            'supplier_type' => Yii::t('app', 'Supplier Type'),
        ], $attributeLabels);
    }

    public function getPurchaseOrder()
    {
        return $this->hasMany(PurchaseOrder::class, ['supplier_id' => 'id']);
    }

    public function getPurchaseInvoice()
    {
        return $this->hasMany(PurchaseInvoice::class, ['supplier_id' => 'id']);
    }

    public static function getListOptions($show_inactive = false)
    {
        $suppliers = self::find()->select(['id', 'name', 'phone_number'])
                                ->where(['disabled' => $show_inactive])
                                ->all();
        $listOptions = [];
        $supplier_name = $supplier_phone = '';

        foreach ($suppliers as $supplier)
        {
            $supplier_name = Html::tag('span', $supplier->name, ['class' => 'text']);
            $supplier_phone = Html::tag('span', $supplier->phone_number, ['class' => 'description']);

            $listOptions[$supplier->id] = $supplier_name . $supplier_phone;
        }

        return $listOptions;
    }

    public function docNumPrefix()
    {
        return self::DOC_NUM_PREFIX;
    }
}
