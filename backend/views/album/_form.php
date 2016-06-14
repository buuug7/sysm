<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:47
 * Desc:
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use trntv\filekit\widget\Upload;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model common\models\Album */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="album-form">

  <?php $form = ActiveForm::begin(); ?>

  <?php echo $form->errorSummary($model); ?>

  <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map($categories, 'id', 'title'), ['prompt' => '']) ?>

  <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'description')->textarea(['rows' => '5',]) ?>

  <?php echo $form->field($model, 'thumbnail')->widget(
    Upload::className(),
    [
      'url' => ['/file-storage/upload'],
      'maxFileSize' => 5000000, // 5 MiB
    ]);
  ?>

  <?php echo $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'status')->checkbox() ?>

  <div class="form-group">
    <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat' : 'btn btn-primary btn-flat']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>

