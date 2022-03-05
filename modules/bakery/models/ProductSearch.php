<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['itemGroup.name']);
    }

    public function rules()
    {
        return [
            [['id', 'doc_status', 'parent', 'parent_field', 'parent_doctype', 'idx', 'default_supplier', 
                'expense_account', 'income_account', 'item_group', 'has_variants', 
                'is_sales_item', 'is_stock_item', 'show_in_website', 'slideshow', 'is_purchase_item', 
                'weight_uom', 'disabled', 'buying_cost_center', 'brand', 'stock_uom', 'sales_uom', 
                'purchase_uom', 'default_bom', 'weightage'], 'integer'],
            [['item_type', 'updated_by', '_assign', '_comments', '_user_tags', '_liked_by', 'created_by', 'name', 
                'itemGroup.name', 'default_material_request_type', 'thumbnail', 'description', 
                'created_at', 'image', 'naming_series', 'website_image', 'updated_at'], 'safe'],
            [['net_weight', 'max_discount', 'min_order_qty', 'last_purchase_rate', 'opening_stock', 
                'qty_in_stock', 'qty_reserved', 'standard_rate'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Product::find();

        // add conditions that should always apply here
        $query->joinWith(['itemGroup']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if ($this->disabled == '-1')
            $this->disabled = null;

        if ($this->{'itemGroup.name'} == '-1')
            $this->{'itemGroup.name'} = null;

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'doc_status' => $this->doc_status,
            'parent' => $this->parent,
            'parent_field' => $this->parent_field,
            'parent_doctype' => $this->parent_doctype,
            'idx' => $this->idx,
            'default_supplier' => $this->default_supplier,
            'net_weight' => $this->net_weight,
            'expense_account' => $this->expense_account,
            'max_discount' => $this->max_discount,
            'income_account' => $this->income_account,
            'has_variants' => $this->has_variants,
            'created_at' => $this->created_at,
            // 'item_group' => $this->item_group,
            'is_sales_item' => $this->is_sales_item,
            'is_stock_item' => $this->is_stock_item,
            'min_order_qty' => $this->min_order_qty,
            'last_purchase_rate' => $this->last_purchase_rate,
            'show_in_website' => $this->show_in_website,
            'slideshow' => $this->slideshow,
            'is_purchase_item' => $this->is_purchase_item,
            'weight_uom' => $this->weight_uom,
            'disabled' => $this->disabled,
            'buying_cost_center' => $this->buying_cost_center,
            'brand' => $this->brand,
            'stock_uom' => $this->stock_uom,
            'sales_uom' => $this->sales_uom,
            'purchase_uom' => $this->purchase_uom,
            'default_bom' => $this->default_bom,
            'weightage' => $this->weightage,
            'opening_stock' => $this->opening_stock,
            'standard_rate' => $this->standard_rate,
            'tax_rate' => $this->tax_rate,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'stock_item_group.name', $this->getAttribute('itemGroup.name')])
            ->andFilterWhere(['like', 'item_type', $this->item_type])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'stock_item.name', $this->name])
            ->andFilterWhere(['like', 'default_material_request_type', $this->default_material_request_type])
            ->andFilterWhere(['like', 'thumbnail', $this->thumbnail])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'naming_series', $this->naming_series])
            ->andFilterWhere(['like', 'website_image', $this->website_image]);

        return $dataProvider;
    }
}
