<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/14
 * Time: 14:32
 * Desc:
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\AlbumCategorySearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="album-category-search">

  <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
  ]); ?>

  <?php echo $form->field($model, 'id') ?>

  <?php echo $form->field($model, 'parent_id') ?>

  <?php echo $form->field($model, 'title') ?>

  <?php echo $form->field($model, 'slug') ?>

  <div class="form-group">
    <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
    <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
