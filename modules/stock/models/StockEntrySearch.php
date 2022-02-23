<?php

namespace logicent\stock\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use logicent\stock\modelsStockEntry;

class StockEntrySearch extends StockEntry
{
    public function rules()
    {
        return [
            [[
                'id', 'status', 'from_warehouse', 'amended_from', 'to_warehouse', 'party_id', 'remarks',
                'title'
            ], 'string'],
            [['created_at', 'updated_at', 'updated_by', 'created_by', ], 'safe'],
            [['total_amount', 'total_quantity'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = StockEntry::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'updated_at' => SORT_ASC,
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
            'status' => $this->status,
            'party' => $this->party,
            'party_id' => $this->party_id,
            'source_id' => $this->source_id,
            'source_type' => $this->source_type,
            'total_quantity' => $this->total_quantity,
            'total_amount' => $this->total_amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'from_warehouse', $this->from_warehouse])
            ->andFilterWhere(['like', 'to_warehouse', $this->to_warehouse])
            ->andFilterWhere(['like', 'amended_from', $this->amended_from])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
