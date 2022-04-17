<?php

namespace logicent\stock\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class PurchaseReceiptSearch extends PurchaseReceipt
{
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'updated_by', 'created_by', 'doc_status', 'parent_id', 'parent_field', 'parent_doctype', 'supplier_name', 'lr_date', 'title', 'supplier_delivery_note', 'instructions', 'address_display', '_assign', 'supplier_address', 'lr_no', 'contact_display', 'supplier', 'buying_price_list', 'terms', 'supplier_warehouse', 'apply_discount_on', 'range', 'contact_person', 'in_words', 'return_against', 'contact_mobile', 'posting_time', 'bill_no', 'tc_name', 'rejected_warehouse', 'is_subcontracted', 'company', 'language', 'shipping_address', 'posting_date', 'naming_series', 'currency', 'letter_head', 'shipping_rule', 'bill_date', 'status', '_liked_by', 'taxes_and_charges', 'transporter_name', 'remarks', 'shipping_address_display', 'contact_email'], 'safe'],
            [['idx', 'set_posting_time', 'is_return'], 'integer'],
            [['taxes_and_charges_added', 'discount_amount', 'taxes_and_charges_deducted', 'additional_discount_percentage', 'total', 'grand_total', 'rounding_adjustment', 'total_taxes_and_charges', 'per_billed', 'total_net_weight', 'net_total'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PurchaseReceipt::find();

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
            'idx' => $this->idx,
            'lr_date' => $this->lr_date,
            'set_posting_time' => $this->set_posting_time,
            'taxes_and_charges_added' => $this->taxes_and_charges_added,
            'discount_amount' => $this->discount_amount,
            'is_return' => $this->is_return,
            'taxes_and_charges_deducted' => $this->taxes_and_charges_deducted,
            'additional_discount_percentage' => $this->additional_discount_percentage,
            'posting_time' => $this->posting_time,
            'total' => $this->total,
            'grand_total' => $this->grand_total,
            'rounding_adjustment' => $this->rounding_adjustment,
            'posting_date' => $this->posting_date,
            'total_taxes_and_charges' => $this->total_taxes_and_charges,
            'bill_date' => $this->bill_date,
            'per_billed' => $this->per_billed,
            'total_net_weight' => $this->total_net_weight,
            'net_total' => $this->net_total,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'doc_status', $this->doc_status])
            ->andFilterWhere(['like', 'parent_id', $this->parent_id])
            ->andFilterWhere(['like', 'parent_field', $this->parent_field])
            ->andFilterWhere(['like', 'parent_doctype', $this->parent_doctype])
            ->andFilterWhere(['like', 'supplier_name', $this->supplier_name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'supplier_delivery_note', $this->supplier_delivery_note])
            ->andFilterWhere(['like', 'instructions', $this->instructions])
            ->andFilterWhere(['like', 'address_display', $this->address_display])
            ->andFilterWhere(['like', '_assign', $this->_assign])
            ->andFilterWhere(['like', 'supplier_address', $this->supplier_address])
            ->andFilterWhere(['like', 'lr_no', $this->lr_no])
            ->andFilterWhere(['like', 'contact_display', $this->contact_display])
            ->andFilterWhere(['like', 'supplier', $this->supplier])
            ->andFilterWhere(['like', 'buying_price_list', $this->buying_price_list])
            ->andFilterWhere(['like', 'terms', $this->terms])
            ->andFilterWhere(['like', 'supplier_warehouse', $this->supplier_warehouse])
            ->andFilterWhere(['like', 'apply_discount_on', $this->apply_discount_on])
            ->andFilterWhere(['like', 'range', $this->range])
            ->andFilterWhere(['like', 'contact_person', $this->contact_person])
            ->andFilterWhere(['like', 'in_words', $this->in_words])
            ->andFilterWhere(['like', 'return_against', $this->return_against])
            ->andFilterWhere(['like', 'contact_mobile', $this->contact_mobile])
            ->andFilterWhere(['like', 'bill_no', $this->bill_no])
            ->andFilterWhere(['like', 'tc_name', $this->tc_name])
            ->andFilterWhere(['like', 'rejected_warehouse', $this->rejected_warehouse])
            ->andFilterWhere(['like', 'is_subcontracted', $this->is_subcontracted])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'shipping_address', $this->shipping_address])
            ->andFilterWhere(['like', 'naming_series', $this->naming_series])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'letter_head', $this->letter_head])
            ->andFilterWhere(['like', 'shipping_rule', $this->shipping_rule])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', '_liked_by', $this->_liked_by])
            ->andFilterWhere(['like', 'taxes_and_charges', $this->taxes_and_charges])
            ->andFilterWhere(['like', 'transporter_name', $this->transporter_name])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'shipping_address_display', $this->shipping_address_display])
            ->andFilterWhere(['like', 'contact_email', $this->contact_email]);

        return $dataProvider;
    }
}
