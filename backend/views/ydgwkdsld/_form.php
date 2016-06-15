<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\models\Ydgwkdsld;
use trntv\yii\datetime\DateTimeWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Ydgwkdsld */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="ydgwkdsld-form">

  <?php $form = ActiveForm::begin(); ?>

  <?php echo $form->errorSummary($model); ?>

  <?php echo $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(\common\models\User::find()->all(),'id','username'),['prompt' => '',]) ?>

  <?php echo $form->field($model, 'sn')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'customer_phone')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'address_detail')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'package_price')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'primary_phone_number')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'secondly_phone_number_1')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'secondly_phone_number_2')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'secondly_phone_number_3')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'customer_confirm_name')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'customer_confirm_time')->widget(
    DateTimeWidget::className(),
    [
      'phpDatetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
      'momentDatetimeFormat' => 'YYYY-MM-DD HH:mm',
      'clientOptions' => [
        'locale' => 'zh-CN'
      ]
    ]
  ) ?>

  <?php echo $form->field($model, 'business_person_name')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'business_person_phone')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'created_at')->widget(
    DateTimeWidget::className(),
    [
      'phpDatetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
      'momentDatetimeFormat' => 'YYYY-MM-DD HH:mm',
      'clientOptions' => [
        'locale' => 'zh-CN'
      ]
    ]
  ) ?>

  <?php echo $form->field($model, 'updated_at')->widget(
    DateTimeWidget::className(),
    [
      'phpDatetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
      'momentDatetimeFormat' => 'YYYY-MM-DD HH:mm',
      'clientOptions' => [
        'locale' => 'zh-CN'
      ]
    ]
  ) ?>

  <?php echo $form->field($model, 'progress')->dropDownList(Ydgwkdsld::getProgress()) ?>

  <?php echo $form->field($model, 'status')->dropDownList(Ydgwkdsld::getStatus()) ?>

  <div class="form-group">
    <?php echo Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
