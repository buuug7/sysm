<?php

namespace common\models;

use PhpOffice\PhpWord\TemplateProcessor;
use Yii;
use yii\behaviors\TimestampBehavior;
use common\commands\AddToTimelineCommand;
use yii\bootstrap\Html;

/**
 * This is the model class for table "{{%ydgwkdsld}}".
 * 移动光网宽带受理单
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $sn
 * @property string $customer_name
 * @property string $customer_phone
 * @property string $address
 * @property string $address_detail
 * @property string $package_price
 * @property string $primary_phone_number
 * @property string $secondly_phone_number_1
 * @property string $secondly_phone_number_2
 * @property string $secondly_phone_number_3
 * @property string $customer_confirm_name
 * @property integer $customer_confirm_time
 * @property string $business_person_name
 * @property string $business_person_phone
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $progress
 * @property integer $status
 *
 * @property User $user
 */
class Ydgwkdsld extends \yii\db\ActiveRecord
{

  const STATUS_NOT_USED = 0;
  const STATUS_IN_USE = 1;

  const PROGRESS_NEW = 0; //新提交的申请
  const PRPGRESS_DOING = 1; //正在处理
  const PROGRESS_FINISHED = 2; //处理完成
  const PROGRESS_EXCEPTION = 3; //异常


  public function behaviors()
  {
    return [
      TimestampBehavior::className(),
    ];
  }


  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return '{{%ydgwkdsld}}';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['customer_name', 'user_id', 'customer_phone', 'address', 'package_price', 'primary_phone_number', 'customer_confirm_name', 'progress', 'status'], 'required'],
      [['user_id', 'progress', 'status'], 'integer'],
      [['customer_confirm_time'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],
      [['customer_confirm_time'], 'default', 'value' => function ()
      {
        return date(DATE_ISO8601);
      }],
      [['sn', 'customer_name', 'customer_phone', 'primary_phone_number', 'secondly_phone_number_1', 'secondly_phone_number_2', 'secondly_phone_number_3', 'customer_confirm_name', 'business_person_name', 'business_person_phone'], 'string', 'max' => 64],
      [['address', 'address_detail', 'package_price'], 'string', 'max' => 512],
      [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => Yii::t('common', 'ID'),
      'user_id' => Yii::t('common', 'User ID'),
      'sn' => Yii::t('common', 'Sn'),
      'customer_name' => '客户姓名',
      'customer_phone' => '客户联系电话',
      'address' => '住宅小区',
      'address_detail' => '详细地址',
      'package_price' => '套餐资费',
      'primary_phone_number' => '主号',
      'secondly_phone_number_1' => '副号1',
      'secondly_phone_number_2' => '副号2',
      'secondly_phone_number_3' => '副号3',
      'customer_confirm_name' => '客户签字确认',
      'customer_confirm_time' => '客户签字确认时间',
      'business_person_name' => '业务办理人员姓名',
      'business_person_phone' => '业务办理人员联系电话',
      'created_at' => Yii::t('common', 'Created At'),
      'updated_at' => Yii::t('common', 'Updated At'),
      'progress' => Yii::t('common', 'Progress'),
      'status' => Yii::t('common', 'Status'),
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getUser()
  {
    return $this->hasOne(User::className(), ['id' => 'user_id']);
  }

  /*
   * set repair SN
   * yyyyMMddHHmmss+4bit(digit)
   * */
  public function setSN()
  {
    $this->sn = Yii::$app->formatter->asDatetime(time(), 'yyyyMMddHHmmss') . mt_rand(1000, 9999);
  }

  /*
   * get progress
   * */
  public static function getProgress()
  {
    return [
      self::PROGRESS_NEW => Yii::t('common', 'Progress New'),
      self::PRPGRESS_DOING => Yii::t('common', 'Progress Doing'),
      self::PROGRESS_FINISHED => Yii::t('common', 'Progress Finished'),
      self::PROGRESS_EXCEPTION => Yii::t('common', 'Progress Exception'),
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


  public function afterSave($insert, $changedAttributes)
  {
    Yii::$app->commandBus->handle(new AddToTimelineCommand([
      'category' => 'ydgwkdsld',
      'event' => 'save',
      'data' => [
        'created_by' => Yii::$app->user->identity->username,
        'model_id' => $this->id,
        'model_name' => $this->sn,
        'created_time' => $insert ? $this->created_at : $this->updated_at,
        'method' => $insert ? 'insert' : "update",
      ]
    ]));

    parent::afterSave($insert, $changedAttributes);
  }

  public function afterDelete()
  {
    Yii::$app->commandBus->handle(new AddToTimelineCommand([
      'category' => 'ydgwkdsld',
      'event' => 'delete',
      'data' => [
        'deleted_by' => Yii::$app->user->identity->username,
        'model_id' => $this->id,
        'model_name' => $this->sn,
        'method' => 'deleted',
        'time' => time(),
      ],
    ]));
    parent::afterDelete();
  }

  public function printBiaoDan($path='phpword/resources/sample.docx',$outputPath='phpword/results/'){

    $message="";
    $tp=new TemplateProcessor($path);
    $message.="<p>".date('H:i:s')." Creating new TemplateProcessor instance...</p>";

    $tp->setValue('created_at', Html::encode(Yii::$app->formatter->asDatetime($this->created_at)));
    $tp->setValue('sn', Html::encode($this->sn));
    $tp->setValue('customer_name', Html::encode($this->customer_name));
    $tp->setValue('customer_phone', Html::encode($this->customer_phone));
    $tp->setValue('address', Html::encode($this->address));
    $tp->setValue('address_detail', Html::encode($this->address_detail));
    $tp->setValue('package_price', Html::encode($this->package_price));
    $tp->setValue('primary_phone_number', Html::encode($this->primary_phone_number));
    $tp->setValue('secondly_phone_number_1', Html::encode($this->secondly_phone_number_1));
    $tp->setValue('secondly_phone_number_2', Html::encode($this->secondly_phone_number_2));
    $tp->setValue('secondly_phone_number_3', Html::encode($this->secondly_phone_number_3));

    $tp->setValue('customer_confirm_name', Html::encode($this->customer_confirm_name));
    $tp->setValue('customer_confirm_time', Html::encode(Yii::$app->formatter->asDatetime($this->customer_confirm_time)));
    $tp->setValue('business_person_name', Html::encode($this->business_person_name));
    $tp->setValue('business_person_phone', Html::encode($this->business_person_phone));

    $message.="<p>".date('H:i:s')." Saving the result document...</p>";
    $tp->saveAs($outputPath."output.docx");
    $message.="<p>".date('H:i:s')." Done writing file(s)</p>";
    $message.="<p>".date('H:i:s')." Peak memory usage:".(memory_get_peak_usage(true) / 1024 / 1024)."MB</p>";
    $message.="<p><a href='/admin/phpword/results/output.docx' class='btn btn-success btn-flat'>下载表单.docx</a> </p>";
    return $message;

  }

}
