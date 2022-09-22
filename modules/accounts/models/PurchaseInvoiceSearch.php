<?php

namespace crudle\ext\accounts\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class PurchaseInvoiceSearch extends PurchaseInvoice
{
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['supplier.name']);
    }

    public function rules()
    {
        return [
            [[
                'id', 'si_reference', 'status', 'issued_at', 'authorized_by', 'supplier_name',
                'total_in_words'
            ], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at'], 'safe'],
            [[
                'deposit_amount', 'paid_amount', 'balance_amount', 'total_amount', 
                'tax_amount'
            ], 'number'],
            [['amounts_tax_inclusive'], 'boolean'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PurchaseInvoice::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'issued_at' => SORT_DESC,
                    'id' => SORT_DESC,                     
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
            'supplier_id' => $this->supplier_id,
            'si_reference' => $this->si_reference,
            'issued_at' => $this->issued_at,
            'due_date' => $this->due_date,
            'update_stock' => $this->update_stock,
            'is_return' => $this->is_return,
            'amended_from' => $this->amended_from,
            'due_date' => $this->due_date,
            'status' => $this->status,
            'currency' => $this->currency,
            'price_list_id' => $this->price_list_id,
            'total_quantity' => $this->total_quantity,
            'change_amount' => $this->change_amount,
            'deposit_amount' => $this->deposit_amount,
            'balance_amount' => $this->balance_amount,
            'paid_amount' => $this->paid_amount,
            'total_amount' => $this->total_amount,
            'tax_amount' => $this->tax_amount,
            'amounts_tax_inclusive' => $this->amounts_tax_inclusive,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query
            ->andFilterWhere(['like', 'supplier_name', $this->supplier_name])
            ->andFilterWhere(['like', 'billing_address', $this->billing_address])
            ->andFilterWhere(['like', 'authorized_by', $this->authorized_by])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'terms', $this->terms])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
