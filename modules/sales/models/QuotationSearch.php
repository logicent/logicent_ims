<?php
namespace logicent\sales\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * QuotationSearch represents the model behind the search form about `app\models\Quotation`.
 */
class QuotationSearch extends Quotation
{
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['customer.name']);
    }

    public function rules()
    {
        return [
            [['id', 'customer_id', 'amounts_tax_inclusive'], 'integer'],
            [['status', 'issued_at', 'valid_till', 'authorized_by', 'customer.name', 'comments', 'tags',
                'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at'], 'safe'],
            [['total_amount', 'tax_amount'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Quotation::find();

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

        $query->joinWith(['customer']);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'sales_quote.id' => $this->id,
            'issued_at' => $this->issued_at,
            'valid_till' => $this->valid_till,
            'total_amount' => $this->total_amount,
            'tax_amount' => $this->tax_amount,
            'amounts_tax_inclusive' => $this->amounts_tax_inclusive,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'customer.name', $this->getAttribute('customer.name')])
            ->andFilterWhere(['like', 'authorized_by', $this->authorized_by])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
