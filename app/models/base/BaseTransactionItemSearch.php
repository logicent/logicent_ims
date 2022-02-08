<?php

namespace app\models\base;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class BaseTransactionItemSearch extends BaseTransactionItem
{
    public $documentModelClass;
    public $documentIdAttribute;

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = $this->documentModelClass::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'item_id' => SORT_DESC, 
                    'issued_at' => SORT_DESC,
                ]
            ]
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
            $this->documentIdAttribute => $this->{$this->documentIdAttribute},
            'item_id' => $this->item_id,
            'item_status' => $this->item_status,
            'quantity' => $this->quantity,
            'unit_price' => $this->unit_price,
            'item_uom' => $this->item_uom,
            'is_free_item' => $this->is_free_item,
            'discount_percent' => $this->discount_percent,
            'discount_amount' => $this->discount_amount,
            'tax_percent' => $this->tax_percent,
            'tax_amount' => $this->tax_amount,
            'net_amount' => $this->net_amount,
            'total_amount' => $this->total_amount,
            'gross_profit' => $this->gross_profit,
        ]);

        $query
            ->andFilterWhere(['like', 'item_name', $this->item_name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
