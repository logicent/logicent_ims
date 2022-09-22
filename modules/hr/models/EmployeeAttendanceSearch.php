<?php

namespace crudle\ext\hr\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class EmployeeAttendanceSearch extends EmployeeAttendance
{
    public function rules()
    {
        return [
            [['id', 'employee_id'], 'integer'],
            [['employee_name', 'workday', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = EmployeeAttendance::find();

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
            'employee_id' => $this->employee_id,
            'workday' => $this->workday,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'employee_name', $this->employee_name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
