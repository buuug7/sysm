<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/22
 * Time: 11:07
 * Desc:
 */

namespace common\models;


use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use Yii;


/**
 * This is the model class for table "friend_links".
 *
 * @property integer $id
 * @property string $category_id
 * @property string $name
 * @property string $url
 * @property string $slug
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class FriendLinks extends ActiveRecord
{

  const STATUS_IN_USE = 1;
  const STATUS_NOT_USED = 0;

  const CATEGORY_SOCIAL = 0; //社交网站
  const CATEGORY_PORTIAL = 1; // 门户网站
  const CATEGORY_SHOP = 2; // 购物网站
  const CATEGORY_OTHERS = 3; // 其他网站

  public function behaviors()
  {
    return [
      [
        'class' => SluggableBehavior::className(),
        'attribute' => 'name',
        'slugAttribute' => 'slug',
        'ensureUnique' => true,
      ],
      [
        'class' => TimestampBehavior::className(),
      ],
    ];
  }

  public static function tableName()
  {
    return "{{%friend_links}}";
  }

  public function rules()
  {
    return [
      [['name', 'url', 'category_id'], 'required'],
      [['category_id', 'sort', 'status'], 'integer'],
      [['name', 'url'], 'string', 'max' => 255],
    ];
  }

  public function attributeLabels()
  {
    return [
      'id' => Yii::t('common', 'ID'),
      'category_id' => Yii::t('common', 'Category'),
      'name' => Yii::t('common', 'Name'),
      'url' => Yii::t('common', 'URL'),
      'slug' => Yii::t('common', 'Slug'),
      'sort' => Yii::t('common', 'Sort'),
      'created_at' => Yii::t('common', 'Created At'),
      'updated_at' => Yii::t('common', 'Updated At'),
      'status' => Yii::t('common', 'Status'),
    ];
  }

  public static function getCategories()
  {
    return [
      self::CATEGORY_SOCIAL => Yii::t('common', 'Category Social'),
      self::CATEGORY_PORTIAL => Yii::t('common', 'Category Portial'),
      self::CATEGORY_SHOP => Yii::t('common', 'Category Shop'),
      self::CATEGORY_OTHERS => Yii::t('common', 'Category Others'),
    ];
  }

  public static function getStatus()
  {
    return [
      self::STATUS_NOT_USED => Yii::t('common', 'Not Used'),
      self::STATUS_IN_USE => Yii::t('common', 'In Use'),
    ];
  }

  public static function getHotLinks($limits)
  {
    return self::find()->where(['status' => self::STATUS_IN_USE,])->orderBy('sort ASC')->limit($limits)->all();
  }
}
