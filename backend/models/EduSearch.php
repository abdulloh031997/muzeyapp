<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Edu;

/**
 * EduSearch represents the model behind the search form about `common\models\Edu`.
 */
class EduSearch extends Edu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'name_ru', 'name_qq', 'organization_id', 'region_id', 'shortname', 'create_at', 'update_at', 'count_plan', 'name_uz'], 'safe'],
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
        $query = Edu::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'name_qq', $this->name_qq])
            ->andFilterWhere(['like', 'organization_id', $this->organization_id])
            ->andFilterWhere(['like', 'region_id', $this->region_id])
            ->andFilterWhere(['like', 'shortname', $this->shortname])
            ->andFilterWhere(['like', 'create_at', $this->create_at])
            ->andFilterWhere(['like', 'update_at', $this->update_at])
            ->andFilterWhere(['like', 'count_plan', $this->count_plan])
            ->andFilterWhere(['like', 'name_uz', $this->name_uz]);

        return $dataProvider;
    }
}
