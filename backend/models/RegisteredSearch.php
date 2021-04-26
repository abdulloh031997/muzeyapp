<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Registered;

/**
 * RegisteredSearch represents the model behind the search form of `common\models\Registered`.
 */
class RegisteredSearch extends Registered
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'region_id', 'type', 'lang_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'lastname', 'fname', 'pser', 'pnum', 'phone', 'workplace'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Registered::find();

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
            'region_id' => $this->region_id,
            'type' => $this->type,
            'lang_id' => $this->lang_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'pser', $this->pser])
            ->andFilterWhere(['like', 'pnum', $this->pnum])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'workplace', $this->workplace]);

        return $dataProvider;
    }
}
