<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `app\models\Customer`.
 */
class CustomerSearch extends Customer
{
    public function rules()
    {
        return [
            [['id', 'inactive', 'default_currency', 'default_price_list', 'credit_days', 'credit_days_based_on', 'customer_group'], 'integer'],
            [['updated_by', 'created_by', 'salutation', 'lead_name', 'phone_number', 'name', 'customer_details', 
                'tax_Id', 'customer_type', 'customer_pos_Id', 'created_at', 'updated_at'], 'safe'],
            [['credit_limit'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Customer::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        if ($this->inactive == '-1')
            $this->inactive = null;
        
        if ($this->customer_type == '-1')
            $this->customer_type = null;

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'inactive' => $this->inactive,
            'default_currency' => $this->default_currency,
            'default_price_list' => $this->default_price_list,
            'credit_days' => $this->credit_days,
            'credit_days_based_on' => $this->credit_days_based_on,
            'credit_limit' => $this->credit_limit,
            'customer_group' => $this->customer_group,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'salutation', $this->salutation])
            ->andFilterWhere(['like', 'lead_name', $this->lead_name])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'customer_details', $this->customer_details])
            ->andFilterWhere(['like', 'tax_Id', $this->tax_Id])
            ->andFilterWhere(['like', 'customer_type', $this->customer_type])
            ->andFilterWhere(['like', 'customer_pos_Id', $this->customer_pos_Id]);

        return $dataProvider;
    }
}
