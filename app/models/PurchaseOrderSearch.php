<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use app\models\PurchaseOrder;

class PurchaseOrderSearch extends PurchaseOrder
{
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['supplier.name']);
    }

    public function rules()
    {
        return [
            [['id', 'pr_reference', 'deposit_amount', 'balance_amount', 'paid_amount', 'total_amount', 
                ], 'integer'],
            [['issued_at', 'status', 'authorized_by', 'created_at', 'supplier_name', 'created_by', 
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
        $query = PurchaseOrder::find();

        // add conditions that should always apply here
        $query->joinWith(['supplier']);

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
                'supplier.name' => [
                    'asc' => ['supplier_name' => SORT_ASC],
                    'desc' => ['supplier_name' => SORT_DESC],
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
            'purchase_order.id' => $this->id,
            'pr_reference' => $this->pr_reference,
            'purchase_order.status' => $this->status,
            'amounts_tax_inclusive' => $this->amounts_tax_inclusive,
            'issued_at' => $this->issued_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'supplier_name', $this->supplier_name])
            ->andFilterWhere(['like', 'authorized_by', $this->authorized_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
