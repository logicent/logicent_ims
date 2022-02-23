<?php

namespace logicent\accounts\models\base;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class BaseTransactionPaymentSearch extends BaseTransactionPayment
{
    public $documentModelClass;
    public $documentIdAttribute;

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = $this->documentModelClass::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'paid_at' => SORT_DESC,
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
            $this->documentIdAttribute => $this->{$this->documentIdAttribute},
            'paid_at' => $this->paid_at,
            'paid_amount' => $this->paid_amount,
            'payment_method' => $this->payment_method,
            'status' => $this->status,
            'account_id' => $this->account_id,
        ]);

        $query->andFilterWhere(['like', 'narration', $this->narration]);

        return $dataProvider;
    }
}
