<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Zarplata;

/**
 * ZarplataSearch represents the model behind the search form of `common\models\Zarplata`.
 */
class ZarplataSearch extends Zarplata
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_employee', 'id_category', 'id_project'], 'integer'],
            [['hour', 'suma'], 'safe'],
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
        $query = Zarplata::find();

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
            'id_employee' => $this->id_employee,
            'id_category' => $this->id_category,
            'id_project' => $this->id_project,
        ]);

        $query->andFilterWhere(['like', 'hour', $this->hour])
            ->andFilterWhere(['like', 'suma', $this->suma]);

        return $dataProvider;
    }
}
