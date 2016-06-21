<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/6/21
 * Time: 15:18
 * Desc:
 */

$this->title = '首页定制';
?>
<div class="box">
  <div class="box-body">
    <?php echo \common\components\keyStorage\FormWidget::widget([
      'model' => $model,
      'formClass' => '\yii\bootstrap\ActiveForm',
      'submitText' => Yii::t('backend', 'Save'),
      'submitOptions' => ['class' => 'btn btn-primary']
    ]); ?>
  </div>
</div>


