<?php

namespace crudle\ext\fleet\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class VehicleServiceSearch extends VehicleService
{
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'updated_by', 'created_by', 'parent_id', 'parent_field', 'parent_doctype', 'frequency', 'type', 'service_item'], 'safe'],
            [['doc_status', 'idx'], 'integer'],
            [['expense_amount'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = VehicleService::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'doc_status' => $this->doc_status,
            'idx' => $this->idx,
            'expense_amount' => $this->expense_amount,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'parent_id', $this->parent_id])
            ->andFilterWhere(['like', 'parent_field', $this->parent_field])
            ->andFilterWhere(['like', 'parent_doctype', $this->parent_doctype])
            ->andFilterWhere(['like', 'frequency', $this->frequency])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'service_item', $this->service_item]);

        return $dataProvider;
    }
}
