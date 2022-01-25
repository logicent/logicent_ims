<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use app\models\SalesOrder;

class SalesOrderSearch extends SalesOrder
{
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['customer.name']);
    }

    public function rules()
    {
        return [
            [['id', 'po_reference', 'deposit_amount', 'balance_amount', 'paid_amount', 'total_amount', 
                ], 'integer'],
            [['issued_at', 'status', 'authorized_by', 'created_at', 'customer_name', 'created_by', 
                'updated_at', 'updated_by'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = SalesOrder::find();

        // add conditions that should always apply here
        $query->joinWith(['customer']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ]
        ]);
        
        $dataProvider->sort->attributes = ArrayHelper::merge(
            $dataProvider->sort->attributes, 
            [
                'customer.name' => [
                    'asc' => ['customer_name' => SORT_ASC],
                    'desc' => ['customer_name' => SORT_DESC],
                ],
            ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'sales_order.id' => $this->id,
            'po_reference' => $this->po_reference,
            'sales_order.status' => $this->status,
            'delivery_date' => $this->delivery_date,
            'issued_at' => $this->issued_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'authorized_by', $this->authorized_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
