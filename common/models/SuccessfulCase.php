<?php

namespace common\models;

use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%successful_case}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property string $slug
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class SuccessfulCase extends \yii\db\ActiveRecord
{

  const STATUS_IN_USE = 1;
  const STATUS_NOT_USED = 0;

  public $thumbnail;


  public function behaviors()
  {
    return [
      [
        'class' => SluggableBehavior::className(),
        'attribute' => 'name',
        'immutable' => true
      ],
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
    return '{{%successful_case}}';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['status', 'name'], 'required'],
      [['status', 'created_at', 'updated_at'], 'integer'],
      [['name'], 'string', 'max' => 64],
      [['url', 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
      [['slug'], 'string', 'max' => 255],
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
      'name' => Yii::t('common', 'Name'),
      'url' => Yii::t('common', 'Url'),
      'thumbnail' => Yii::t('common', 'Thumbnail'),
      'thumbnail_base_url' => Yii::t('common', 'Thumbnail Base Url'),
      'thumbnail_path' => Yii::t('common', 'Thumbnail Path'),
      'slug' => Yii::t('common', 'Slug'),
      'status' => Yii::t('common', 'Status'),
      'created_at' => Yii::t('common', 'Created At'),
      'updated_at' => Yii::t('common', 'Updated At'),
    ];
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

  /**
   * @return string
   */
  public function getImageUrl()
  {
    return rtrim($this->thumbnail_base_url, '/') . '/' . ltrim($this->thumbnail_path, '/');
  }
}
