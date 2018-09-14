<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Payment;

/**
 * PaymentSearch represents the model behind the search form of `frontend\models\Payment`.
 */
class PaymentSearch extends Payment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpayment', 'idclient', 'keterangan', 'bukti_transfer', 'user_approve', 'tanggal'], 'safe'],
            [['nominal'], 'number'],
            [['status'], 'integer'],
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
        $query = Payment::find();

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
            'nominal' => $this->nominal,
            'status' => $this->status,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'idpayment', $this->idpayment])
            ->andFilterWhere(['like', 'idclient', $this->idclient])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'bukti_transfer', $this->bukti_transfer])
            ->andFilterWhere(['like', 'user_approve', $this->user_approve]);

        return $dataProvider;
    }
}
