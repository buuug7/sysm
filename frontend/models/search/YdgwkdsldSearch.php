<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ydgwkdsld;

/**
 * YdgwkdsldSearch represents the model behind the search form about `common\models\Ydgwkdsld`.
 */
class YdgwkdsldSearch extends Ydgwkdsld
{

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['id', 'user_id', 'customer_confirm_time', 'created_at', 'updated_at', 'progress', 'status'], 'integer'],
      [['sn', 'customer_name', 'customer_phone', 'address', 'address_detail', 'package_price', 'primary_phone_number', 'secondly_phone_number_1', 'secondly_phone_number_2', 'secondly_phone_number_3', 'customer_confirm_name', 'business_person_name', 'business_person_phone'], 'safe'],
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
    $query = Ydgwkdsld::find()->where(['user_id' => Yii::$app->user->getId(),]);

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    if (!($this->load($params) && $this->validate()))
    {
      return $dataProvider;
    }

    $query->andFilterWhere([
      //'id' => $this->id,
      //'user_id' => $this->user_id,
      'customer_confirm_time' => $this->customer_confirm_time,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
      'progress' => $this->progress,
      //'status' => $this->status,
    ]);

    $query->andFilterWhere(['like', 'sn', $this->sn])
      ->andFilterWhere(['like', 'customer_name', $this->customer_name])
      ->andFilterWhere(['like', 'customer_phone', $this->customer_phone])
      ->andFilterWhere(['like', 'address', $this->address])
      ->andFilterWhere(['like', 'address_detail', $this->address_detail])
      ->andFilterWhere(['like', 'package_price', $this->package_price])
      ->andFilterWhere(['like', 'primary_phone_number', $this->primary_phone_number])
      ->andFilterWhere(['like', 'secondly_phone_number_1', $this->secondly_phone_number_1])
      ->andFilterWhere(['like', 'secondly_phone_number_2', $this->secondly_phone_number_2])
      ->andFilterWhere(['like', 'secondly_phone_number_3', $this->secondly_phone_number_3])
      ->andFilterWhere(['like', 'customer_confirm_name', $this->customer_confirm_name])
      ->andFilterWhere(['like', 'business_person_name', $this->business_person_name])
      ->andFilterWhere(['like', 'business_person_phone', $this->business_person_phone]);

    return $dataProvider;
  }
}
