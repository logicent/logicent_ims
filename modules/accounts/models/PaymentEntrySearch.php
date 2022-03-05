<?php

namespace app\models\accounts;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\accounts\PaymentEntry;

class PaymentEntrySearch extends PaymentEntry
{
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'updated_by', 'created_by', 'doc_status', 'parent_id', 'parent_field', 'parent_doctype', 'naming_series', 'reference_no', 'paid_to', 'reference_date', 'mode_of_payment', 'title', 'party_type', 'amended_from', 'party', 'clearance_date', 'company', '_assign', 'paid_from', 'party_name', 'remarks', 'subscription', 'paid_to_account_currency', 'paid_from_account_currency', 'project', 'payment_type', 'posting_date'], 'safe'],
            [['base_paid_amount', 'unallocated_amount', 'target_exchange_rate', 'total_allocated_amount', 'base_total_allocated_amount', 'base_received_amount', 'source_exchange_rate', 'party_balance', 'paid_from_account_balance', 'paid_to_account_balance', 'paid_amount', 'received_amount', 'difference_amount'], 'number'],
            [['allocate_payment_amount'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PaymentEntry::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'base_paid_amount' => $this->base_paid_amount,
            'reference_date' => $this->reference_date,
            'unallocated_amount' => $this->unallocated_amount,
            'allocate_payment_amount' => $this->allocate_payment_amount,
            'target_exchange_rate' => $this->target_exchange_rate,
            'total_allocated_amount' => $this->total_allocated_amount,
            'base_total_allocated_amount' => $this->base_total_allocated_amount,
            'base_received_amount' => $this->base_received_amount,
            'source_exchange_rate' => $this->source_exchange_rate,
            'clearance_date' => $this->clearance_date,
            'party_balance' => $this->party_balance,
            'paid_from_account_balance' => $this->paid_from_account_balance,
            'paid_to_account_balance' => $this->paid_to_account_balance,
            'paid_amount' => $this->paid_amount,
            'received_amount' => $this->received_amount,
            'difference_amount' => $this->difference_amount,
            'posting_date' => $this->posting_date,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'doc_status', $this->doc_status])
            ->andFilterWhere(['like', 'parent_id', $this->parent_id])
            ->andFilterWhere(['like', 'parent_field', $this->parent_field])
            ->andFilterWhere(['like', 'parent_doctype', $this->parent_doctype])
            ->andFilterWhere(['like', 'naming_series', $this->naming_series])
            ->andFilterWhere(['like', 'reference_no', $this->reference_no])
            ->andFilterWhere(['like', 'paid_to', $this->paid_to])
            ->andFilterWhere(['like', 'mode_of_payment', $this->mode_of_payment])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'party_type', $this->party_type])
            ->andFilterWhere(['like', 'amended_from', $this->amended_from])
            ->andFilterWhere(['like', 'party', $this->party])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', '_assign', $this->_assign])
            ->andFilterWhere(['like', 'paid_from', $this->paid_from])
            ->andFilterWhere(['like', 'party_name', $this->party_name])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'subscription', $this->subscription])
            ->andFilterWhere(['like', 'paid_to_account_currency', $this->paid_to_account_currency])
            ->andFilterWhere(['like', 'paid_from_account_currency', $this->paid_from_account_currency])
            ->andFilterWhere(['like', 'project', $this->project])
            ->andFilterWhere(['like', 'payment_type', $this->payment_type]);

        return $dataProvider;
    }
}
