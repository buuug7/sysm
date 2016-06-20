<?php

namespace frontend\models\search;

use frontend\models\Fankui;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * FanKuiSearch represents the model behind the search form about `common\models\Fankui`.
 */
class FanKuiSearch extends Fankui
{

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['id', 'user_id', 'customer_confirm_time', 'created_at', 'updated_at', 'red_light_flashing', 'progress', 'status'], 'integer'],
      [['sn', 'customer_name', 'customer_phone', 'address', 'detail_description', 'error_code', 'address_detail', 'customer_confirm_name', 'business_person_name', 'business_person_phone'], 'safe'],
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
    $query = Fankui::find()->where(['user_id' => Yii::$app->user->getId(),]);

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    if (!($this->load($params) && $this->validate()))
    {
      return $dataProvider;
    }

    $query->andFilterWhere([
     // 'id' => $this->id,
     // 'user_id' => $this->user_id,
      'customer_confirm_time' => $this->customer_confirm_time,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
      'progress' => $this->progress,
      'status' => $this->status,
      'red_light_flashing' => $this->red_light_flashing,
    ]);

    $query->andFilterWhere(['like', 'sn', $this->sn])
      ->andFilterWhere(['like', 'customer_name', $this->customer_name])
      ->andFilterWhere(['like', 'customer_phone', $this->customer_phone])
      ->andFilterWhere(['like', 'address', $this->address])
      ->andFilterWhere(['like', 'address_detail', $this->address_detail])
      ->andFilterWhere(['like', 'customer_confirm_name', $this->customer_confirm_name])
      ->andFilterWhere(['like', 'business_person_name', $this->business_person_name])
      ->andFilterWhere(['like', 'business_person_phone', $this->business_person_phone])
      ->andFilterWhere(['like', 'detail_description', $this->detail_description])
      ->andFilterWhere(['like', 'error_code', $this->error_code]);

    return $dataProvider;
  }
}
