<?php

namespace logicent\stock\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use logicent\stock\models\ItemWarehouse;

class ItemWarehouseSearch extends ItemWarehouse
{
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'item_id', 'warehouse_id'], 'string', 'max' => 140],
            [['qty_in_stock', 'qty_ordered', 'qty_reserved', 'qty_committed'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ItemWarehouse::find();

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
            // 'inactive' => $this->inactive,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
