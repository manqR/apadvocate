<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Dokument;

/**
 * DokumentSearch represents the model behind the search form of `frontend\models\Dokument`.
 */
class DokumentSearch extends Dokument
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddokumen'], 'integer'],
            [['kategori', 'idclient', 'filename', 'tanggal', 'user_upload'], 'safe'],
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
        $query = Dokument::find();

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
            'iddokumen' => $this->iddokumen,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'kategori', $this->kategori])
            ->andFilterWhere(['like', 'idclient', $this->idclient])
            ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'user_upload', $this->user_upload]);

        return $dataProvider;
    }
}
