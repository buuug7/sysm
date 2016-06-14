<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:41
 * Desc:
 */

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Album;

class AlbumSearch extends Album
{

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['id', 'created_at', 'updated_at', 'status'], 'integer'],
      [['name', 'descripton', 'thumbnail_base_url', 'thumbnail_path', 'url'], 'safe'],
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
    $query = Album::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    if (!($this->load($params) && $this->validate()))
    {
      return $dataProvider;
    }

    $query->andFilterWhere([
      'id' => $this->id,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
      'status' => $this->status,
    ]);

    $query->andFilterWhere(['like', 'thumbnail_base_url', $this->thumbnail_base_url])
      ->andFilterWhere(['like', 'thumbnail_path', $this->thumbnail_path])
      ->andFilterWhere(['like', 'url', $this->url])
      ->andFilterWhere(['like', 'name', $this->name])
      ->andFilterWhere(['like', 'descripton', $this->description]);

    return $dataProvider;
  }

}
