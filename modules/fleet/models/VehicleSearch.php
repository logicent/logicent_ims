<?php

namespace crudle\ext\fleet\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class VehicleSearch extends Vehicle
{
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'updated_by', 'created_by', 'doc_status', 'parent_id', 'parent_field', 'parent_doctype', 'acquisition_date', 'license_plate', 'carbon_check_date', 'policy_no', 'fuel_type', 'location', 'employee', 'start_date', 'uom', 'end_date', '_assign', 'model', 'color', 'insurance_company', 'chassis_no', 'make'], 'safe'],
            [['idx', 'last_odometer', 'doors', 'wheels'], 'integer'],
            [['vehicle_value'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Vehicle::find();

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
            'acquisition_date' => $this->acquisition_date,
            'carbon_check_date' => $this->carbon_check_date,
            'last_odometer' => $this->last_odometer,
            'vehicle_value' => $this->vehicle_value,
            'start_date' => $this->start_date,
            'doors' => $this->doors,
            'end_date' => $this->end_date,
            'wheels' => $this->wheels,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'doc_status', $this->doc_status])
            ->andFilterWhere(['like', 'parent_id', $this->parent_id])
            ->andFilterWhere(['like', 'parent_field', $this->parent_field])
            ->andFilterWhere(['like', 'parent_doctype', $this->parent_doctype])
            ->andFilterWhere(['like', 'license_plate', $this->license_plate])
            ->andFilterWhere(['like', 'policy_no', $this->policy_no])
            ->andFilterWhere(['like', 'fuel_type', $this->fuel_type])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'employee', $this->employee])
            ->andFilterWhere(['like', 'uom', $this->uom])
            ->andFilterWhere(['like', '_assign', $this->_assign])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'insurance_company', $this->insurance_company])
            ->andFilterWhere(['like', 'chassis_no', $this->chassis_no])
            ->andFilterWhere(['like', 'make', $this->make]);

        return $dataProvider;
    }
}
