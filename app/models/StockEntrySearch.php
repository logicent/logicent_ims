<?php

namespace app\models\stock;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StockEntry;

class StockEntrySearch extends StockEntry
{
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [[
                'created_at', 'updated_at', 'updated_by', 'created_by', 'from_warehouse', 'amended_from',
                'to_warehouse', 'supplier_name', 'remarks', 'title'], 'safe'],
            [[
                'total_amount', 'total_quantity'], 'number'],
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'total_quantity' => $this->total_quantity,
            'total_total' => $this->total_total,
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
