<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FundraiserComment;

/**
 * FundraiserCommentSearch represents the model behind the search form of `backend\models\FundraiserComment`.
 */
class FundraiserCommentSearch extends FundraiserComment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sender_id', 'receiver_id', 'fundraiser_id', 'status'], 'integer'],
            [['message', 'created_at', 'modified_at','from_date','to_date'], 'safe'],
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
        $query = FundraiserComment::find()->where(['status'=>1]);

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
            'sender_id' => $this->sender_id,
            'receiver_id' => $this->receiver_id,
            'fundraiser_id' => $this->fundraiser_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,
        ]);
        if($this->from_date){
            $query->andFilterWhere(['>=','DATE(created_at)',date('Y-m-d',strtotime($this->from_date))]);            
        }
        if($this->to_date){
            $query->andFilterWhere(['<=','DATE(created_at)',date('Y-m-d',strtotime($this->to_date))]);            
        }
        $query->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
