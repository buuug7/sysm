<?php
/**
 * Created by PhpStorm.
 * User: buuug7
 * Date: 2016/3/3
 * Time: 14:15
 * Desc:
 */
?>

<div class="timeline-item">
    <span class="time">
        <i class="fa fa-clock-o"></i>
      <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>
    </span>

  <h3 class="timeline-header">
    <?= "意见反馈与报修 (编号{$model->data['model_name']})被删除了" ?>
  </h3>

  <div class="timeline-body text-danger">

    <?= Yii::$app->formatter->asDatetime($model->data['time']) . " : 意见反馈与报修 (编号{$model->data['model_name']}) 被用户 {$model->data['deleted_by']} 删除了" ?>
  </div>
  <div class="timeline-footer">
  </div>
</div>
