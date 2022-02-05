<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SalesInvoice;

class SalesInvoiceSearch extends SalesInvoice
{
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['customer.name']);
    }

    public function rules()
    {
        return [
            [[
                'id', 'po_no', 'status', 'posting_date', 'authorized_by', 'customer_name',
                'total_in_words'
            ], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at'], 'safe'],
            [[
                'deposit_amount', 'paid_amount', 'balance_amount', 'total_amount', 'tax_amount'
            ], 'number'],
            [['amounts_tax_inclusive'], 'boolean']
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = SalesInvoice::find()->where(['deleted_at' => null]);

        // add conditions that should always apply here
        // $query->joinWith(['customer']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
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
            'customer_id' => $this->customer_id,
            'po_no' => $this->po_no,
            'po_date' => $this->po_date,
            'posting_date' => $this->posting_date,
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
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
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
