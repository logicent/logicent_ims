<?php

namespace logicent\production\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ProductionBatchSearch extends ProductionBatch
{
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'updated_by', 'created_by', 'doc_status', 'name', 'parent_batch', 'ref_doctype', 'ref_id', 'item_made', 'mfg_date', 'supplier_id', 'note', '_assign'], 'safe'],
            [['shelf_life'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ProductionBatch::find();

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
            'mfg_date' => $this->mfg_date,
            'shelf_life' => $this->shelf_life,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'doc_status', $this->doc_status])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'parent_batch', $this->parent_batch])
            ->andFilterWhere(['like', 'ref_doctype', $this->ref_doctype])
            ->andFilterWhere(['like', 'ref_id', $this->ref_id])
            ->andFilterWhere(['like', 'item_made', $this->item_made])
            ->andFilterWhere(['like', 'supplier_id', $this->supplier_id])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', '_assign', $this->_assign]);

        return $dataProvider;
    }
}
