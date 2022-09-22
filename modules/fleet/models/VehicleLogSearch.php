<?php

namespace crudle\ext\fleet\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class VehicleLogSearch extends VehicleLog
{
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'updated_by', 'created_by', 'doc_status', 'parent_id', 'parent_field', 'parent_doctype', 'license_plate', 'reference', 'make', 'employee_id', '_assign', 'supplier_id', 'trip_date', 'model'], 'safe'],
            [['idx', 'odometer'], 'integer'],
            [['fuel_qty', 'unit_price'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = VehicleLog::find();

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
            'idx' => $this->idx,
            'fuel_qty' => $this->fuel_qty,
            'odometer' => $this->odometer,
            'unit_price' => $this->unit_price,
            'trip_date' => $this->trip_date,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'doc_status', $this->doc_status])
            ->andFilterWhere(['like', 'parent_id', $this->parent_id])
            ->andFilterWhere(['like', 'parent_field', $this->parent_field])
            ->andFilterWhere(['like', 'parent_doctype', $this->parent_doctype])
            ->andFilterWhere(['like', 'license_plate', $this->license_plate])
            ->andFilterWhere(['like', 'reference', $this->reference])
            ->andFilterWhere(['like', 'make', $this->make])
            ->andFilterWhere(['like', 'employee_id', $this->employee_id])
            ->andFilterWhere(['like', '_assign', $this->_assign])
            ->andFilterWhere(['like', 'supplier_id', $this->supplier_id])
            ->andFilterWhere(['like', 'model', $this->model]);

        return $dataProvider;
    }
}
