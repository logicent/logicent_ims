<?php

namespace logicent\accounts\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class BranchSearch extends Branch
{
    public function rules()
    {
        return [
            [['id', 'inactive'], 'integer'],
            [['created_at', 'updated_at', 'updated_by', 'created_by'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Branch::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if ($this->inactive == '-1')
            $this->inactive = null;
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'inactive' => $this->inactive,
        ]);

        $query->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'id', $this->id]);

        return $dataProvider;
    }
}
