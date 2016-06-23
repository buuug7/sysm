<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Video;

/* @var $this yii\web\View */
/* @var $model common\models\Video */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="video-form">

  <?php $form = ActiveForm::begin(); ?>

  <?php echo $form->errorSummary($model); ?>

  <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'videoassets')->widget(
    \trntv\filekit\widget\Upload::className(),
    [
      'url' => ['/file-storage/upload'],
      'maxFileSize' => 10 * 10 * 10 * 1024 * 1024, // 10*10*10 MiB
      // 'acceptFileTypes' => new \yii\web\JsExpression('/((\.|\/)(gif|jpe?g|png)$)|(^video\/.*$)/i'),
    ]);
  ?>


  <?php echo $form->field($model, 'status')->dropDownList(Video::getStatus()) ?>

  <div class="form-group">
    <?php echo Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
