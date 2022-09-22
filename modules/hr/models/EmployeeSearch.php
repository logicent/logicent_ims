<?php

namespace crudle\ext\hr\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class EmployeeSearch extends Employee
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['full_name', 'firstname', 'surname', 'emp_type', 'tax_identifier', 'health_fund_id', 
                'social_security_id', 'identity_card', 'emp_code', 'current_address', 'personal_email', 
                'company_email', 'mobile', 'designation', 'sex', 'blood_group', 'additional_info', 
                'status', 'hired_on', 'left_on', 'reason_left', 'birth_date', 'created_at', 'created_by', 
                'updated_at', 'updated_by'], 
            'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Employee::find();

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
            'hired_on' => $this->hired_on,
            'left_on' => $this->left_on,
            'birth_date' => $this->birth_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query
            ->andFilterWhere(['like', 'firstname', $this->full_name])
            // use orFilterWhere because attribute is re-used
            ->orFilterWhere(['like', 'surname', $this->full_name])

            ->andFilterWhere(['like', 'emp_type', $this->emp_type])
            ->andFilterWhere(['like', 'tax_identifier', $this->tax_identifier])
            ->andFilterWhere(['like', 'health_fund_id', $this->health_fund_id])
            ->andFilterWhere(['like', 'social_security_id', $this->social_security_id])
            ->andFilterWhere(['like', 'identity_card', $this->identity_card])
            ->andFilterWhere(['like', 'emp_code', $this->emp_code])
            ->andFilterWhere(['like', 'current_address', $this->current_address])
            ->andFilterWhere(['like', 'personal_email', $this->personal_email])
            ->andFilterWhere(['like', 'company_email', $this->company_email])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'designation', $this->designation])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'blood_group', $this->blood_group])
            ->andFilterWhere(['like', 'additional_info', $this->additional_info])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'reason_left', $this->reason_left])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
