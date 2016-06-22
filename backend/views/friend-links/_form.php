<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/22
 * Time: 17:23
 * Desc:
 */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use common\models\FriendLinks;

/* @var $this yii\web\View */
/* @var $model common\models\FriendLinks */
/* @var $form yii\bootstrap\ActiveForm */

?>

<div class="friend-links-form">

  <?php $form = ActiveForm::begin(); ?>

  <?php echo $form->errorSummary($model); ?>

  <?php echo $form->field($model, 'category_id')->dropDownList(FriendLinks::getCategories()) ?>

  <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

  <?php echo $form->field($model, 'sort')->textInput() ?>

  <?php echo $form->field($model, 'status')->dropDownList(\common\models\Album::getStatus()) ?>

  <div class="form-group">
    <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat' : 'btn btn-primary btn-flat']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>

