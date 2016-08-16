<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use frontend\models\Ydgwkdsld;
use trntv\yii\datetime\DateTimeWidget;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ydgwkdsld */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="ydgwkdsld-form">
  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <?php $form = ActiveForm::begin([
      'options' => [
        'class' => 'reg-page',
      ],
    ]); ?>

    <div class="reg-header">
      <h2>办理移动光网宽带受理单</h2>
    </div>

    <?php echo $form->errorSummary($model); ?>

    <!--  --><?php /*echo $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(\common\models\User::find()->all(),'id','username'),['prompt' => '',]) */ ?>

    <!--  --><?php /*echo $form->field($model, 'sn')->textInput(['maxlength' => true]) */ ?>

    <?php echo $form->field($model, 'customer_name')->textInput(['maxlength' => true])->label("客户姓名 (<span style='color:red;'>*填写真实姓名</span>)") ?>

    <?php echo $form->field($model, 'customer_phone')->textInput(['maxlength' => true])->label("客户联系电话 (<span
    style='color:red;'>*能联系到的电话/业务主号</span>)") ?>

    <?php echo $form->field($model, 'address')->textInput(['maxlength' => true])->label("住宅小区 (<span style='color:red;'>*填写真实地址</span>)") ?>

    <?php echo $form->field($model, 'address_detail')->textInput(['maxlength' => true])->label("详细地址 (<span style='color:red;'>*填写真实地址</span>)") ?>

    <?php echo $form->field($model, 'package_price')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'primary_phone_number')->textInput(['maxlength' => true])->label("宽带主号码") ?>

    <?php echo $form->field($model, 'secondly_phone_number_1')->textInput(['maxlength' => true])->label("宽带副号码1") ?>

    <?php echo $form->field($model, 'secondly_phone_number_2')->textInput(['maxlength' => true])->label("宽带副号码2") ?>

    <?php echo $form->field($model, 'secondly_phone_number_3')->textInput(['maxlength' => true])->label("宽带副号码3") ?>

    <!--  --><?php /*echo $form->field($model, 'customer_confirm_name')->textInput(['maxlength' => true]) */ ?>

    <!--  --><?php /*echo $form->field($model, 'customer_confirm_time')->widget(
    DateTimeWidget::className(),
    [
      'phpDatetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
      'momentDatetimeFormat' => 'YYYY-MM-DD HH:mm',
      'clientOptions' => [
        'locale' => 'zh-CN'
      ]
    ]
  ) */ ?>

    <!--  --><?php /*echo $form->field($model, 'business_person_name')->textInput(['maxlength' => true]) */ ?>

    <!--  --><?php /*echo $form->field($model, 'business_person_phone')->textInput(['maxlength' => true]) */ ?>

    <!--  --><?php /*echo $form->field($model, 'created_at')->widget(
    DateTimeWidget::className(),
    [
      'phpDatetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
      'momentDatetimeFormat' => 'YYYY-MM-DD HH:mm',
      'clientOptions' => [
        'locale' => 'zh-CN'
      ]
    ]
  ) */ ?>

    <!--  --><?php /*echo $form->field($model, 'updated_at')->widget(
    DateTimeWidget::className(),
    [
      'phpDatetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
      'momentDatetimeFormat' => 'YYYY-MM-DD HH:mm',
      'clientOptions' => [
        'locale' => 'zh-CN'
      ]
    ]
  ) */ ?>

    <!--  --><?php /*echo $form->field($model, 'progress')->dropDownList(Ydgwkdsld::getProgress()) */ ?>

    <!--  --><?php /*echo $form->field($model, 'status')->dropDownList(Ydgwkdsld::getStatus()) */ ?>

    <?= $form->field($model, 'captcha')->widget(Captcha::className(), [
      'captchaAction' => ['/site/captcha']
    ]) ?>

    <div class="form-group">
      <?php echo Html::submitButton('提交', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>


</div>
