<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:22
 * Desc:
 */

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AlbumCategory;

/**
 * AlbumCategorySearch represents the model behind the search form about `common\models\AlbumCategory`.
 */
class AlbumCategorySearch extends AlbumCategory
{
  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['id', 'parent_id'], 'integer'],
      [['title', 'slug'], 'safe'],
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
    $query = AlbumCategory::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    if (!($this->load($params) && $this->validate())) {
      return $dataProvider;
    }

    $query->andFilterWhere([
      'id' => $this->id,
      'parent_id' => $this->parent_id,
    ]);

    $query->andFilterWhere(['like', 'title', $this->title])
      ->andFilterWhere(['like', 'slug', $this->slug]);

    return $dataProvider;
  }
}

