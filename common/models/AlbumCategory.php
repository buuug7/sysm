<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:14
 * Desc:
 */


namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "{{%album_category}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $slug
 *
 * @property Album[] $albums
 * @property AlbumCategory $parent
 * @property AlbumCategory[] $albumCategories
 */
class AlbumCategory extends \yii\db\ActiveRecord
{

  public function behaviors()
  {
    return [
      [
        'class' => SluggableBehavior::className(),
        'attribute' => 'title',
        'slugAttribute' => 'slug'
      ],
    ];
  }

  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return '{{%album_category}}';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['parent_id'], 'integer'],
      [['title'], 'required'],
      [['title', 'slug'], 'string', 'max' => 255]
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => Yii::t('common', 'ID'),
      'parent_id' => Yii::t('common', 'Parent ID'),
      'title' => Yii::t('common', 'Title'),
      'slug' => Yii::t('common', 'Slug'),
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getAlbums()
  {
    return $this->hasMany(Album::className(), ['category_id' => 'id']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getParent()
  {
    return $this->hasOne(AlbumCategory::className(), ['id' => 'parent_id']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getAlbumCategories()
  {
    return $this->hasMany(AlbumCategory::className(), ['parent_id' => 'id']);
  }
}
