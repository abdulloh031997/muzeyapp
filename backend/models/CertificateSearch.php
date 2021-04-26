<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Certificate;

/**
 * CertificateSearch represents the model behind the search form of `common\models\Certificate`.
 */
class CertificateSearch extends Certificate
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'psnum', 'imie'], 'integer'],
            [['lname', 'fname', 'mname', 'bdate', 'psser', 'phone', 'special', 'workplace', 'create_at', 'update_at'], 'safe'],
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
        $query = Certificate::find();

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
            'psnum' => $this->psnum,
            'imie' => $this->imie,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'mname', $this->mname])
            ->andFilterWhere(['like', 'bdate', $this->bdate])
            ->andFilterWhere(['like', 'psser', $this->psser])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'special', $this->special])
            ->andFilterWhere(['like', 'workplace', $this->workplace]);

        return $dataProvider;
    }
}
