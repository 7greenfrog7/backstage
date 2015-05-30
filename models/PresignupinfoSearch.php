<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Presignupinfo;

/**
 * PresignupinfoSearch represents the model behind the search form about `app\models\Presignupinfo`.
 */
class PresignupinfoSearch extends Presignupinfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sid', 'uid'], 'integer'],
            [['email', 'username', 'mobilephone', 'sex', 'address', 'realname', 'count_bank', 'count_number', 'result', 'validate', 'game_account', 'game_password', 'remark', 'action_datetime', 'begin_datetime'], 'safe'],
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
        $query = Presignupinfo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'sid' => $this->sid,
            'uid' => $this->uid,
            'action_datetime' => $this->action_datetime,
            'begin_datetime' => $this->begin_datetime,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'mobilephone', $this->mobilephone])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'realname', $this->realname])
            ->andFilterWhere(['like', 'count_bank', $this->count_bank])
            ->andFilterWhere(['like', 'count_number', $this->count_number])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'validate', $this->validate])
            ->andFilterWhere(['like', 'game_account', $this->game_account])
            ->andFilterWhere(['like', 'game_password', $this->game_password])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
