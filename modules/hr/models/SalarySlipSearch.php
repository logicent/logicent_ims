<?php

namespace logicent\hr\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class SalarySlipSearch extends SalarySlip
{
    public function rules()
    {
        return [
            [['id', 'salary_structure', 'employee_id'], 'integer'],
            [['employee_name', 'designation', 'company', 'branch', 'department', 'from_period', 'to_period', 'bank_name', 'bank_account_no', 'has_timesheet', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
            [['working_days', 'hour_rate', 'leave_without_pay', 'payment_days', 'gross_pay', 'total_deduction', 'total_principal_amount', 'total_loan_repayment', 'total_interest_amount', 'net_pay', 'rounded_total', 'total_working_hours'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = SalarySlip::find();

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
            'salary_structure' => $this->salary_structure,
            'employee_id' => $this->employee_id,
            'from_period' => $this->from_period,
            'to_period' => $this->to_period,
            'working_days' => $this->working_days,
            'hour_rate' => $this->hour_rate,
            'leave_without_pay' => $this->leave_without_pay,
            'payment_days' => $this->payment_days,
            'gross_pay' => $this->gross_pay,
            'total_deduction' => $this->total_deduction,
            'total_principal_amount' => $this->total_principal_amount,
            'total_loan_repayment' => $this->total_loan_repayment,
            'total_interest_amount' => $this->total_interest_amount,
            'net_pay' => $this->net_pay,
            'rounded_total' => $this->rounded_total,
            'total_working_hours' => $this->total_working_hours,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'employee_name', $this->employee_name])
            ->andFilterWhere(['like', 'designation', $this->designation])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'branch', $this->branch])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'bank_name', $this->bank_name])
            ->andFilterWhere(['like', 'bank_account_no', $this->bank_account_no])
            ->andFilterWhere(['like', 'has_timesheet', $this->has_timesheet])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
