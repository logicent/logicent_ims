<?php

namespace crudle\ext\stock\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ItemSearch represents the model behind the search form about `app\models\Item`.
 */
class ItemSearch extends Item
{
    public function rules()
    {
        return [
            [[
                'has_variants', 'is_sales_item', 'is_stock_item', 'is_purchase_item', 
                'inactive', 'item_uom', 'sales_uom', 'purchase_uom'
            ], 'integer'],
            [[
                'id', 'default_supplier', 'expense_account', 'income_account', 'item_group', 'name',
                'description', 'weight_uom', 'brand_id', 'tax_code'
            ], 'string'],
            [[
                'item_type', 'updated_by', 'tags', 'created_by', 'created_at', 'updated_at'
            ], 'safe'],
            [[
                'net_weight', 'max_discount', 'min_order_qty', 'last_purchase_rate', 'opening_stock', 
                'qty_in_stock', 'qty_reserved', 'standard_rate'
            ], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Item::find()->where(['deleted_at' => null]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if ($this->inactive == '-1')
            $this->inactive = null;

        if ($this->item_group == '-1')
            $this->item_group = null;

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'default_supplier' => $this->default_supplier,
            'net_weight' => $this->net_weight,
            'expense_account' => $this->expense_account,
            'max_discount' => $this->max_discount,
            'income_account' => $this->income_account,
            'has_variants' => $this->has_variants,
            'created_at' => $this->created_at,
            'is_sales_item' => $this->is_sales_item,
            'is_stock_item' => $this->is_stock_item,
            'min_order_qty' => $this->min_order_qty,
            'last_purchase_rate' => $this->last_purchase_rate,
            'is_purchase_item' => $this->is_purchase_item,
            'weight_uom' => $this->weight_uom,
            'inactive' => $this->inactive,
            'brand_id' => $this->brand_id,
            'item_uom' => $this->item_uom,
            'sales_uom' => $this->sales_uom,
            'purchase_uom' => $this->purchase_uom,
            'opening_stock' => $this->opening_stock,
            'standard_rate' => $this->standard_rate,
            'tax_code' => $this->tax_code,
            'tax_rate' => $this->tax_rate,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'item_group', $this->item_group])
            ->andFilterWhere(['like', 'item_type', $this->item_type])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
