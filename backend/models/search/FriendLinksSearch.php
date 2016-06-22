<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/22
 * Time: 15:10
 * Desc:
 */

namespace backend\models\search;


use common\models\FriendLinks;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * FriendLInksSearch represents the model behind the search form about `common\models\FriendLinks`.
 */
class FriendLinksSearch extends FriendLinks
{

  public function rules()
  {
    return [
      [['id', 'category', 'created_at', 'updated_at', 'status'], 'integer'],
      [['slug', 'name', 'url'], 'safe'],
    ];
  }

  public function scenarios()
  {
    return Model::scenarios();
  }

  public function search($params)
  {
    $query = FriendLinks::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    if (!($this->load($params) && $this->validate()))
    {
      return $dataProvider;
    }

    $query->andFilterWhere([
      'id' => $this->id,
      'category' => $this->category,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
      'status' => $this->status,
    ]);

    $query->andFilterWhere(['like', 'slug', $this->slug])
      ->andFilterWhere(['like', 'name', $this->name])
      ->andFilterWhere(['like', 'url', $this->url]);

    return $dataProvider;
  }


}
