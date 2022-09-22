<?php
namespace crudle\ext\bakery\models;

use crudle\ext\sales\models\SalesOrder;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use crudle\ext\sales\models\SalesOrderItem;

class BakeryOrderSearch extends SalesOrderItem
{
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), [
                            'stockItem.name', 
                            'salesDoc.delivery_at',
                        ]);
    }

    public function rules()
    {
        return [
            [['id', 'sales_order_id', 'item_id', 'tax_rate', 'account_id', 'num_of_people'], 'integer'],
            [['bake_status', 'deco_status', 'description', 'occassion', 'message', 'shape', 'baked_by', 
                'stockItem.name', 'salesDoc.delivery_at', 'decorated_by'], 'safe'],
            [['qty', 'unit_price', 'discount_percent', 'total_amount'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $salesDoc = SalesOrder::find()->select('id')->where(['doc_status' => 'Submitted'])->column();

        $query = SalesOrderItem::find()->where(['in', 'sales_order_id', $salesDoc]);

        // add conditions that should always apply here
        $query->joinWith(['stockItem']);
        $query->joinWith(['salesDoc'])->viaTable('customer', ['id' => 'customer_id']);
        // $query->joinWith(['customer'])->via('salesDoc', ['customer_id' => 'id']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'salesDoc.delivery_at' => SORT_ASC, 
                ]
            ]            
        ]);

        $dataProvider->sort->attributes = ArrayHelper::merge(
            $dataProvider->sort->attributes, 
            [
                'stockItem.name' => [
                    'asc' => ['stock_item.name' => SORT_ASC],
                    'desc' => ['stock_item.name' => SORT_DESC],
                ],
                'salesDoc.delivery_at' => [
                    'asc' => ['sales_order.delivery_at' => SORT_ASC],
                    'desc' => ['sales_order.delivery_at' => SORT_DESC],
                ],
            ]);
        
        $this->load($params);

        if ($this->bake_status == '-1')
            $this->bake_status = null;

        if ($this->deco_status == '-1')
            $this->deco_status = null;

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sales_order_id' => $this->sales_order_id,
            // 'item_id' => $this->item_id,
            'qty' => $this->qty,
            'unit_price' => $this->unit_price,
            'discount_percent' => $this->discount_percent,
            'total_amount' => $this->total_amount,
            'tax_rate' => $this->tax_rate,
            'account_id' => $this->account_id,
            'num_of_people' => $this->num_of_people,
        ]); 

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'stock_item.name', $this->getAttribute('stockItem.name')])
            ->andFilterWhere(['like', 'occassion', $this->occassion])
            ->andFilterWhere(['like', 'bake_status', $this->bake_status])
            ->andFilterWhere(['like', 'deco_status', $this->deco_status])
            ->andFilterWhere(['like', 'sales_order.delivery_at', $this->getAttribute('salesDoc.delivery_at')])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'shape', $this->shape])
            ->andFilterWhere(['like', 'baked_by', $this->baked_by])
            ->andFilterWhere(['like', 'decorated_by', $this->decorated_by]);

        return $dataProvider;
    }
}
