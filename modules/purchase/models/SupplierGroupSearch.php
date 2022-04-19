<?php

namespace logicent\purchase\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SupplierGroupSearch represents the model behind the search form about `app\models\SupplierGroup`.
 */
class SupplierGroupSearch extends SupplierGroup
{
    public function rules()
    {
        return [
            [['id', 'default_price_list'], 'string'],
            [['credit_days', 'credit_days_based_on'], 'integer'],
            [['inactive'], 'boolean'],
            [['credit_limit'], 'number'],
            [[
                'updated_by', 'created_by', 'name', 'created_at', 'updated_at'
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
        $query = SupplierGroup::find()->where(['deleted_at' => null]);

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
            'default_price_list' => $this->default_price_list,
            'credit_days' => $this->credit_days,
            'credit_days_based_on' => $this->credit_days_based_on,
            'credit_limit' => $this->credit_limit,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
