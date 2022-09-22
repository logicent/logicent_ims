<?php

namespace crudle\ext\hr\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class SalaryStructureSearch extends SalaryStructure
{
    public function rules()
    {
        return [
            [['id', 'ts_salary_component'], 'integer'],
            [['code', 'name', 'description', 'enabled', 'is_default', 'payroll_frequency', 'use_timesheet', 'mode_of_payment', 'payment_account', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
            [['hour_rate', 'total_earning', 'total_deduction', 'net_pay'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = SalaryStructure::find();

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
            'ts_salary_component' => $this->ts_salary_component,
            'hour_rate' => $this->hour_rate,
            'total_earning' => $this->total_earning,
            'total_deduction' => $this->total_deduction,
            'net_pay' => $this->net_pay,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'enabled', $this->enabled])
            ->andFilterWhere(['like', 'is_default', $this->is_default])
            ->andFilterWhere(['like', 'payroll_frequency', $this->payroll_frequency])
            ->andFilterWhere(['like', 'use_timesheet', $this->use_timesheet])
            ->andFilterWhere(['like', 'mode_of_payment', $this->mode_of_payment])
            ->andFilterWhere(['like', 'payment_account', $this->payment_account])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
