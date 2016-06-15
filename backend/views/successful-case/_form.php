<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use trntv\filekit\widget\Upload;

/* @var $this yii\web\View */
/* @var $model common\models\SuccessfulCase */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="successful-case-form">

  <?php $form = ActiveForm::begin(); ?>

  <?php echo $form->errorSummary($model); ?>

  <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'thumbnail')->widget(
    Upload::className(),
    [
      'url' => ['/file-storage/upload'],
      'maxFileSize' => 5000000, // 5 MiB
    ]);
  ?>

  <?php echo $form->field($model, 'status')->dropDownList(\common\models\SuccessfulCase::getStatus()) ?>

  <div class="form-group">
    <?php echo Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
