<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Complex;

/**
 * ComplexSearch represents the model behind the search form of `common\models\Complex`.
 */
class ComplexSearch extends Complex
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'edu_id', 'education_id'], 'integer'],
            [['region_id'], 'safe'],
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
        $query = Complex::find();

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
            'edu_id' => $this->edu_id,
            'education_id' => $this->education_id,
        ]);

        $query->andFilterWhere(['ilike', 'region_id', $this->region_id]);

        return $dataProvider;
    }
}
