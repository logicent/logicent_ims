<?php

namespace logicent\sales\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SalesPersonSearch represents the model behind the search form about `app\models\SalesPerson`.
 */
class SalesPersonSearch extends SalesPerson
{
    public function rules()
    {
        return [
            [['id'], 'string'],
            [['inactive'], 'boolean'],
            [[
                'updated_by', 'created_by', 'employee_name', 'created_at', 'updated_at'
            ], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = SalesPerson::find()->where(['deleted_at' => null]);

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
            'id' => $this->id,
            'inactive' => $this->inactive,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'employee_name', $this->employee_name]);

        return $dataProvider;
    }
}
