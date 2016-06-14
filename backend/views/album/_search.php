<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:48
 * Desc:
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\AlbumSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="album-search">

  <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
  ]); ?>

  <?php echo $form->field($model, 'id') ?>

  <?php echo $form->field($model, 'name') ?>

  <?php echo $form->field($model, 'thumbnail_base_url') ?>

  <?php echo $form->field($model, 'thumbnail_path') ?>

  <?php // echo $form->field($model, 'url') ?>

  <?php // echo $form->field($model, 'created_at') ?>

  <?php // echo $form->field($model, 'updated_at') ?>

  <?php // echo $form->field($model, 'status') ?>

  <div class="form-group">
    <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
    <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
