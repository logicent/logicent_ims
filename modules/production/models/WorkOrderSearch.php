<?php

namespace crudle\ext\production\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class WorkOrderSearch extends WorkOrder
{
    public function rules()
    {
        return [
            [['id', 'reference', 'doc_status', 'issue_date', 'product_id', 'batch_no', 'production_date', 'customer_id', 'billing_address', 'summary', 'delivery_at', 'delivery_address', 'delivery_instructions', 'authorized_by', 'notes', '_assign', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
            [['product_qty', 'total_cost'], 'number'],
            [['shelf_life'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = WorkOrder::find();

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
            'issue_date' => $this->issue_date,
            'product_qty' => $this->product_qty,
            'production_date' => $this->production_date,
            'shelf_life' => $this->shelf_life,
            'total_cost' => $this->total_cost,
            'delivery_at' => $this->delivery_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'reference', $this->reference])
            ->andFilterWhere(['like', 'doc_status', $this->doc_status])
            ->andFilterWhere(['like', 'product_id', $this->product_id])
            ->andFilterWhere(['like', 'batch_no', $this->batch_no])
            ->andFilterWhere(['like', 'customer_id', $this->customer_id])
            ->andFilterWhere(['like', 'billing_address', $this->billing_address])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'delivery_address', $this->delivery_address])
            ->andFilterWhere(['like', 'delivery_instructions', $this->delivery_instructions])
            ->andFilterWhere(['like', 'authorized_by', $this->authorized_by])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', '_assign', $this->_assign])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
