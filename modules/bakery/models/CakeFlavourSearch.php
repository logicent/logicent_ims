<?php

namespace logicent\bakery\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CakeFlavourSearch represents the model behind the search form of `app\models\CakeFlavour`.
 */
class CakeFlavourSearch extends CakeFlavour
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idx', 'item_group', 'slideshow'], 'integer'],
            [['updated_by', '_assign', '_comments', '_user_tags', '_liked_by', 'created_by', 'resourcing', 'name', 'decoration', 'thumbnail', 'has_variants', 'description', 'created_at', 'image', 'show_in_website', 'disabled', 'website_image', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CakeFlavour::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'idx' => $this->idx,
            'item_group' => $this->item_group,
            'created_at' => $this->created_at,
            'slideshow' => $this->slideshow,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', '_assign', $this->_assign])
            ->andFilterWhere(['like', '_comments', $this->_comments])
            ->andFilterWhere(['like', '_user_tags', $this->_user_tags])
            ->andFilterWhere(['like', '_liked_by', $this->_liked_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'resourcing', $this->resourcing])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'decoration', $this->decoration])
            ->andFilterWhere(['like', 'thumbnail', $this->thumbnail])
            ->andFilterWhere(['like', 'has_variants', $this->has_variants])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'show_in_website', $this->show_in_website])
            ->andFilterWhere(['like', 'disabled', $this->disabled])
            ->andFilterWhere(['like', 'website_image', $this->website_image]);

        return $dataProvider;
    }
}
