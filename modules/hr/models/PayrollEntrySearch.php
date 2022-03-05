<?php

namespace app\models\hr;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\hr\PayrollEntry;

class PayrollEntrySearch extends PayrollEntry
{
    public function rules()
    {
        return [
            [['id', 'salary_structure'], 'integer'],
            [['posting_date', 'payroll_frequency', 'start_period', 'end_period', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PayrollEntry::find();

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
            'posting_date' => $this->posting_date,
            'start_period' => $this->start_period,
            'end_period' => $this->end_period,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'payroll_frequency', $this->payroll_frequency])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
