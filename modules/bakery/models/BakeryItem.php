<?php

namespace crudle\ext\bakery\models;

use crudle\ext\stock\models\Item;

/**
 * This is the model sub class of class "StockItem".
 *
 * @property StockItemGroup $itemGroup
 */
class BakeryItem extends Item
{
    public function rules()
    {
        return [
        ];
    }

    public function getDefaultValues()
    {
        // $this->item_group = 'Ingredient';
        $this->is_purchase_item = true;
        $this->is_stock_item = true;
        $this->stock_uom = 'Kg';
        $this->weight_uom = 'Kg';
    }

    public function getListOptions($type = 'Ingredient')
    {
        return self::find()->select(['id', 'name'])->where(['item_type' => $type])->asArray()->all();
    }
}
