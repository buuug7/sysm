<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2015/12/14
 * Time: 17:36
 * Desc:
 */
?>
<div class="timeline-item">
    <span class="time">
        <i class="fa fa-clock-o"></i>
      <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>
    </span>

  <h3 class="timeline-header">
    <?php if ($model->data['method'] === 'insert'): ?>
      <?= "新的意见反馈与报修(编号{$model->data['model_name']})已经被提交" ?>
    <?php else: ?>
      <?= "新的意见反馈与报修(编号{$model->data['model_name']})已经被更新" ?>
    <?php endif; ?>
  </h3>

  <div class="timeline-body">
    <?php if ($model->data['method'] === 'insert'): ?>
      <?= Yii::$app->formatter->asDatetime($model->data['created_time']) . " : 用户({$model->data['created_by']})提交了新的意见反馈与报修(编号{$model->data['model_name']}),请尽快处理" ?>
    <?php else: ?>
      <?= Yii::$app->formatter->asDatetime($model->data['created_time']) . " : 用户({$model->data['created_by']})更新了意见反馈与报修(编号{$model->data['model_name']})" ?>
    <?php endif; ?>
  </div>

  <div class="timeline-footer">
    <?php echo \yii\helpers\Html::a(
      Yii::t('common', 'View Detail'),
      ['/fan-kui/view', 'id' => $model->data['model_id']],
      ['class' => 'btn btn-danger btn-sm btn-flat']
    ) ?>
  </div>
</div>
