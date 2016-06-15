<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:15
 * Desc:
 */

namespace common\models;


use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tq_player_album".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property integer $description
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property string $url
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 *
 * @property AlbumCategory $category
 */
class Album extends \yii\db\ActiveRecord
{

  const STATUS_NOT_USED = 0;
  const STATUS_IN_USE = 1;

  public $thumbnail;

  public function behaviors()
  {
    return [
      TimestampBehavior::className(),
      [
        'class' => UploadBehavior::className(),
        'attribute' => 'thumbnail',
        'pathAttribute' => 'thumbnail_path',
        'baseUrlAttribute' => 'thumbnail_base_url'
      ]
    ];
  }

  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return '{{%album}}';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['category_id', 'status','name'], 'required'],
      [['status','category_id'], 'integer'],
      [['url'], 'string', 'max' => 255],
      [['description'], 'string'],
      [['thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
      ['thumbnail', 'safe']
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => Yii::t('common', 'ID'),
      'category_id' => Yii::t('common', 'Category ID'),
      'name' => Yii::t('common','Name'),
      'description' => Yii::t('common', 'Description'),
      'thumbnail' => Yii::t('common', 'Thumbnail'),
      'thumbnail_base_url' => Yii::t('common', 'Thumbnail Base Url'),
      'thumbnail_path' => Yii::t('common', 'Thumbnail Path'),
      'url' => Yii::t('common', 'Url'),
      'created_at' => Yii::t('common', 'Created At'),
      'updated_at' => Yii::t('common', 'Updated At'),
      'status' => Yii::t('common', 'Status'),
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getCategory()
  {
    return $this->hasOne(AlbumCategory::className(), ['id' => 'category_id']);
  }


  /**
   * @return string
   */
  public function getImageUrl()
  {
    return rtrim($this->thumbnail_base_url, '/') . '/' . ltrim($this->thumbnail_path, '/');
  }


  /**
   * @return array
   */
  public static function getStatus()
  {
    return [
      self::STATUS_NOT_USED => Yii::t('common', 'Not Used'),
      self::STATUS_IN_USE => Yii::t('common', 'In Use'),
    ];
  }


}
