<?php

namespace common\models;

use Yii;
use trntv\filekit\behaviors\UploadBehavior;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "{{%video}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $path
 * @property string $base_url
 * @property string $type
 * @property integer $size
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class Video extends \yii\db\ActiveRecord
{

  const STATUS_NOT_USED = 0;
  const STATUS_IN_USE = 1;

  public $videoassets;

  /**
   * @inheritdoc
   */
  public function behaviors()
  {
    return [
      TimestampBehavior::className(),
      [
        'class' => SluggableBehavior::className(),
        'attribute' => 'name',
        'immutable' => true
      ],
      [
        'class' => UploadBehavior::className(),
        'attribute' => 'videoassets',
        'pathAttribute' => 'path',
        'baseUrlAttribute' => 'base_url',
        //'orderAttribute' => 'order',
        'typeAttribute' => 'type',
        'sizeAttribute' => 'size',
        //'nameAttribute' => 'name',
      ],
    ];
  }


  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return '{{%video}}';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['name', 'slug'], 'required'],
      [['size', 'created_at', 'updated_at', 'status'], 'integer'],
      [['name', 'slug'], 'string', 'max' => 1024],
      [['path', 'base_url', 'type'], 'string', 'max' => 255],
      [['videoassets'], 'safe']
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
      'slug' => Yii::t('common', 'Slug'),
      'path' => Yii::t('common', 'Path'),
      'base_url' => Yii::t('common', 'Base Url'),
      'type' => Yii::t('common', 'Type'),
      'size' => Yii::t('common', 'Size'),
      'created_at' => Yii::t('common', 'Created At'),
      'updated_at' => Yii::t('common', 'Updated At'),
      'status' => Yii::t('common', 'Status'),
      'videoassets' => Yii::t('common','Video Assets'),
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


  public function getVideoUrl()
  {
    $url = null;
    $url = env('STORAGE_URL') . '/source/' . $this->path;
    return $url;
  }

  public static function getLatestVideo($limit)
  {
    return self::find()->where(['status' => self::STATUS_IN_USE,])->orderBy('updated_at DESC')->limit($limit)->all();
  }
}
