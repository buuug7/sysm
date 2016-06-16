<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\commands\AddToTimelineCommand;
use PhpOffice\PhpWord\TemplateProcessor;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use common\commands\SendEmailCommand;

/**
 * This is the model class for table "{{%fankui}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $sn
 * @property string $customer_name
 * @property string $customer_phone
 * @property string $address
 * @property string $address_detail
 * @property string $error_code
 * @property integer $red_light_flashing
 * @property string $detail_description
 * @property string $customer_confirm_name
 * @property integer $customer_confirm_time
 * @property string $business_person_name
 * @property string $business_person_phone
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $progress
 * @property integer $status
 */
class Fankui extends \yii\db\ActiveRecord
{

  const STATUS_NOT_USED = 0;
  const STATUS_IN_USE = 1;

  const PROGRESS_NEW = 0; //新提交的申请
  const PRPGRESS_DOING = 1; //正在处理
  const PROGRESS_FINISHED = 2; //处理完成
  const PROGRESS_EXCEPTION = 3; //异常

  const RED_LIGHT_FLASHING_OFF = 0;
  const RED_LIGHT_FLASHING_ON = 1;


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
    return '{{%fankui}}';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['user_id', 'customer_name', 'customer_phone', 'address_detail', 'error_code', 'red_light_flashing', 'detail_description'], 'required'],
      [['user_id', 'red_light_flashing', 'created_at', 'updated_at', 'progress', 'status'], 'integer'],
      [['detail_description'], 'string'],
      [['customer_phone'], 'match', 'pattern' => '/^1[34578]\d{9}$/',],
      [['sn', 'customer_name', 'error_code', 'customer_confirm_name', 'business_person_name', 'business_person_phone'], 'string', 'max' => 64],
      [['customer_phone'], 'string', 'max' => 255],
      [['address', 'address_detail'], 'string', 'max' => 512],
      [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'user_id' => Yii::t('common', 'User ID'),
      'sn' => '编号',
      'customer_name' => '客户姓名',
      'customer_phone' => '客户联系电话',
      'address' => '住宅小区',
      'address_detail' => '详细地址',
      'error_code' => '错误代码',
      'red_light_flashing' => '红灯闪烁',
      'detail_description' => '错误详情描述',
      'customer_confirm_name' => '客户确认签字',
      'customer_confirm_time' => '客户确认时间',
      'business_person_name' => '办理人员姓名',
      'business_person_phone' => '办理人员电话',
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

  /**
   * @return array
   */
  public static function getRedLightFlashingStatus()
  {
    return [
      self::RED_LIGHT_FLASHING_OFF => '未闪烁',
      self::RED_LIGHT_FLASHING_ON => '闪烁',
    ];
  }


  public function afterSave($insert, $changedAttributes)
  {
    Yii::$app->commandBus->handle(new AddToTimelineCommand([
      'category' => 'fankui',
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
      'category' => 'fankui',
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


  public function printBiaoDan($path = 'phpword/resources/fankui.docx', $outputPath = 'phpword/results/')
  {

    $message = "";
    $tp = new TemplateProcessor($path);
    $message .= "<p>" . date('H:i:s') . " Creating new TemplateProcessor instance...</p>";

    $tp->setValue('created_at', Html::encode(Yii::$app->formatter->asDatetime($this->created_at)));
    $tp->setValue('sn', Html::encode($this->sn));
    $tp->setValue('customer_name', Html::encode($this->customer_name));
    $tp->setValue('customer_phone', Html::encode($this->customer_phone));
    $tp->setValue('address', Html::encode($this->address));
    $tp->setValue('address_detail', Html::encode($this->address_detail));

    $tp->setValue('error_code', Html::encode($this->error_code));
    $tp->setValue('red_light_flashing', Html::encode(ArrayHelper::getValue(self::getRedLightFlashingStatus(), $this->red_light_flashing)));
    $tp->setValue('detail_description', Html::encode($this->detail_description));


    $tp->setValue('business_person_name', Html::encode($this->business_person_name));
    $tp->setValue('business_person_phone', Html::encode($this->business_person_phone));

    $message .= "<p>" . date('H:i:s') . " Saving the result document...</p>";
    $tp->saveAs($outputPath . "output.docx");
    $message .= "<p>" . date('H:i:s') . " Done writing file(s)</p>";
    $message .= "<p>" . date('H:i:s') . " Peak memory usage:" . (memory_get_peak_usage(true) / 1024 / 1024) . "MB</p>";
    $message .= "<p><a href='/admin/phpword/results/output.docx' class='btn btn-success btn-flat'>下载表单.docx</a> </p>";
    return $message;

  }

  public function sendEmail()
  {
    Yii::$app->commandBus->handle(new SendEmailCommand([
      'subject' => '意见反馈与报修',
      'view' => 'fankui',
      'to' => Yii::$app->user->identity->email,
      'params' => [
        'model' => $this,
      ]
    ]));
  }


}
