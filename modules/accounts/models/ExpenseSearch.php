<?php

namespace logicent\accounts\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ExpenseSearch represents the model behind the search form about `app\models\Expense`.
 */
class ExpenseSearch extends Expense
{
    public function rules()
    {
        return [];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Expense::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'type' => $this->type,
            'date' => $this->date,
            'amount' => $this->amount,
            'payment_method' => $this->payment_method,
            'currency' => $this->currency,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'reference', $this->reference])
            ->andFilterWhere(['like', 'narration', $this->narration])
            ->andFilterWhere(['like', 'payee', $this->payee]);

        return $dataProvider;
    }
}
