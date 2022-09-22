<?php

namespace crudle\ext\bakery\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class RecipeSearch extends BakeryIngredient
{
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), [
                            'stockItem.name', 'ingredient.name', 
                        ]);
    }

    public function rules()
    {
        return [
            [['id', 'baked_good_id', 'ingredient_id'], 'integer'],
            [['stockItem.name', 'ingredient.name', 'description', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
            [['qty_required', 'unit_cost', 'total_cost'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = BakeryIngredient::find();

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->joinWith(['stockItem']);
        // $query->joinWith(['ingredient']);

        $dataProvider->sort->attributes = ArrayHelper::merge(
            $dataProvider->sort->attributes, 
            [
                'stockItem.name' => [
                    'asc' => ['stock_item.name' => SORT_ASC],
                    'desc' => ['stock_item.name' => SORT_DESC],
                ],
                // 'ingredient.name' => [
                //     'asc' => ['stock_item.name' => SORT_ASC],
                //     'desc' => ['stock_item.name' => SORT_DESC],
                // ],                
            ]);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            // 'baked_good_id' => $this->baked_good_id,
            // 'ingredient_id' => $this->ingredient_id,
            'qty_required' => $this->qty_required,
            'unit_cost' => $this->unit_cost,
            'total_cost' => $this->total_cost,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'stock_item.name', $this->getAttribute('stockItem.name')])
            // ->andFilterWhere(['like', 'stock_item.name', $this->getAttribute('ingredient.name')])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}   
