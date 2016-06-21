<?php

namespace common\models;

use common\commands\AddToTimelineCommand;
use common\models\query\ArticleQuery;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string $view
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property array $attachments
 * @property integer $author_id
 * @property integer $updater_id
 * @property integer $category_id
 * @property integer $status
 * @property integer $published_at
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $recommend
 * @property string $description
 *
 * @property User $author
 * @property User $updater
 * @property ArticleCategory $category
 * @property ArticleAttachment[] $articleAttachments
 */
class Article extends ActiveRecord
{

  const STATUS_PUBLISHED = 1;
  const STATUS_DRAFT = 0;

  const RECOMMEND_NO = 0;
  const RECOMMEND_YES = 1;

  /**
   * @var array
   */
  public $attachments;

  /**
   * @var array
   */
  public $thumbnail;

  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return '{{%article}}';
  }

  /**
   * @return ArticleQuery
   */
  public static function find()
  {
    return new ArticleQuery(get_called_class());
  }

  /**
   * @inheritdoc
   */
  public function behaviors()
  {
    return [
      TimestampBehavior::className(),
      [
        'class' => BlameableBehavior::className(),
        'createdByAttribute' => 'author_id',
        'updatedByAttribute' => 'updater_id',

      ],
      [
        'class' => SluggableBehavior::className(),
        'attribute' => 'title',
        'immutable' => true
      ],
      [
        'class' => UploadBehavior::className(),
        'attribute' => 'attachments',
        'multiple' => true,
        'uploadRelation' => 'articleAttachments',
        'pathAttribute' => 'path',
        'baseUrlAttribute' => 'base_url',
        'orderAttribute' => 'order',
        'typeAttribute' => 'type',
        'sizeAttribute' => 'size',
        'nameAttribute' => 'name',
      ],
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
  public function rules()
  {
    return [
      [['title', 'body', 'category_id'], 'required'],
      [['slug'], 'unique'],
      [['body', 'description'], 'string'],
      [['published_at'], 'default', 'value' => function ()
      {
        return date(DATE_ISO8601);
      }],
      [['published_at'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],
      [['category_id'], 'exist', 'targetClass' => ArticleCategory::className(), 'targetAttribute' => 'id'],
      [['author_id', 'recommend', 'updater_id', 'status'], 'integer'],
      [['slug', 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
      [['title'], 'string', 'max' => 512],
      [['view'], 'string', 'max' => 255],
      [['attachments', 'thumbnail'], 'safe']
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => Yii::t('common', 'ID'),
      'slug' => Yii::t('common', 'Slug'),
      'title' => Yii::t('common', 'Title'),
      'body' => Yii::t('common', 'Body'),
      'view' => Yii::t('common', 'Article View'),
      'thumbnail' => Yii::t('common', 'Thumbnail'),
      'author_id' => Yii::t('common', 'Author'),
      'updater_id' => Yii::t('common', 'Updater'),
      'category_id' => Yii::t('common', 'Category'),
      'status' => Yii::t('common', 'Published'),
      'published_at' => Yii::t('common', 'Published At'),
      'created_at' => Yii::t('common', 'Created At'),
      'updated_at' => Yii::t('common', 'Updated At'),
      'attachments' => Yii::t('common', 'Attachments'),

      'recommend' => Yii::t('common', 'Recommend'),
      'description' => Yii::t('common', 'Description'),
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getAuthor()
  {
    return $this->hasOne(User::className(), ['id' => 'author_id']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getUpdater()
  {
    return $this->hasOne(User::className(), ['id' => 'updater_id']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getCategory()
  {
    return $this->hasOne(ArticleCategory::className(), ['id' => 'category_id']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getArticleAttachments()
  {
    return $this->hasMany(ArticleAttachment::className(), ['article_id' => 'id']);
  }

  public function afterSave($insert, $changedAttributes)
  {
    Yii::$app->commandBus->handle(new AddToTimelineCommand([
      'category' => 'article',
      'event' => 'save',
      'data' => [
        'created_by' => Yii::$app->user->identity->username,
        'model_id' => $this->id,
        'model_name' => $this->title,
        'created_time' => $insert ? $this->created_at : $this->updated_at,
        'method' => $insert ? 'insert' : "update",
      ]
    ]));

    parent::afterSave($insert, $changedAttributes);
  }

  public function afterDelete()
  {
    Yii::$app->commandBus->handle(new AddToTimelineCommand([
      'category' => 'article',
      'event' => 'delete',
      'data' => [
        'deleted_by' => Yii::$app->user->identity->username,
        'model_id' => $this->id,
        'model_name' => $this->title,
        'method' => 'deleted',
        'time' => time(),
      ],
    ]));
    parent::afterDelete();
  }


  /**
   * @return array
   */
  public static function getStatus()
  {
    return [
      self::STATUS_PUBLISHED => Yii::t('common', 'Published'),
      self::STATUS_DRAFT => Yii::t('common', 'Draft'),
    ];
  }

  /**
   * @return array
   */
  public static function getRecommend()
  {
    return [
      self::RECOMMEND_NO => Yii::t('common', 'Recommend No'),
      self::RECOMMEND_YES => Yii::t('common', 'Recommend Yes'),
    ];
  }


  public static function getRecentArticles($limit)
  {
    return (new static())->find()->published()->orderBy('published_at DESC')->limit($limit)->all();
  }

  public static function getRecommendArticlesByCategorySlug($slug)
  {
    $catgeogryId = ArticleCategory::findOne(['slug' => $slug,])->id;
    return self::find()->published()->filterWhere([
      'recommend' => self::RECOMMEND_YES,
      'category_id' => $catgeogryId,
    ])->orderBy('published_at DESC')->one();
  }
}
