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
<h2 class="text-center">办理移动光网宽带受理单</h2>

<div class="ydgwkdsld-form">

  <?php $form = ActiveForm::begin(); ?>

  <?php echo $form->errorSummary($model); ?>

  <!--  --><?php /*echo $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(\common\models\User::find()->all(),'id','username'),['prompt' => '',]) */ ?>

  <!--  --><?php /*echo $form->field($model, 'sn')->textInput(['maxlength' => true]) */ ?>

  <?php echo $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'customer_phone')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'address_detail')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'package_price')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'primary_phone_number')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'secondly_phone_number_1')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'secondly_phone_number_2')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'secondly_phone_number_3')->textInput(['maxlength' => true]) ?>

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
