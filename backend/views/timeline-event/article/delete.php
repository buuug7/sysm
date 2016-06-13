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
		<?= Yii::t('common', 'article ( {model_name} ) was deleted!', ['model_name' => $model->data['model_name']]) ?>
	</h3>

	<div class="timeline-body text-danger">
		<?php echo Yii::t('common', '{created_time} : article ( {model_name} ) was deleted by user {deleted_by}', [
			'created_time' => Yii::$app->formatter->asDatetime($model->data['time']),
			'deleted_by' => $model->data['deleted_by'],
			'model_name' => $model->data['model_name'],
		]) ?>
	</div>
	<div class="timeline-footer">
	</div>
</div>
