<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ComplexFans;

/**
 * ComplexFansSearch represents the model behind the search form of `common\models\ComplexFans`.
 */
class ComplexFansSearch extends ComplexFans
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ball', 'block_order', 'complex_id'], 'integer'],
            [['fan_id'], 'safe'],
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
        $query = ComplexFans::find();

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
            'ball' => $this->ball,
            'block_order' => $this->block_order,
            'complex_id' => $this->complex_id,
        ]);

        $query->andFilterWhere(['ilike', 'fan_id', $this->fan_id]);

        return $dataProvider;
    }
}
